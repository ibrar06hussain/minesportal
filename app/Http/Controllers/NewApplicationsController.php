<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Company;
use App\Models\Polygon;
use Illuminate\Http\Request;
use App\Models\ChallansGenerated;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NewApplicationRequest;
use App\Models\LeaseApplicationRegistrations;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Log;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\LeaseApplicationCoordinates;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\ApplicationComments;
use GeoPhp\GeoPHP;
use GeoPHP\Geometry;
//use geoPHP\geoPHP;
use App\Helpers\GeoPHPHelper; // Import the

use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Str;

class NewApplicationsController extends Controller
{
    public function new_application(){
        $user=Auth::user();
        $email=$user->email;
        $districts = Area::select('District', 'DistrictName')
                               ->distinct()
                               ->get();
        $minerals = Category::where('parent_id', 1)->get();
        return view("admin.new_applications.new_application",["districts"=>$districts,'minerals'=>$minerals,'email'=>$email]);
    }

    public function new_application_store(NewApplicationRequest $request){
        $user=Auth::user();
        $user_id=$user->id;
        $email=$user->email;
        $company = Company::where('user_id', $user_id)->firstOrFail();
        $firm_registration_path="";
        $deed_partnership_path="";
        if($request->hasFile('firm_registration')){
            $firm_registration_path = $request->file('firm_registration')->store('companydocuments', 'public_uploads');
        }
        if($request->hasFile('deed_partnership')){

            $deed_partnership_path = $request->file('deed_partnership')->store('companydocuments', 'public_uploads');
        }
        $lease_app=new LeaseApplicationRegistrations();
        $lease_app->firm_registration=$firm_registration_path;
        $lease_app->deed_partnership=$deed_partnership_path;
        $lease_app->name_mineral=$request->name_mineral;
        $lease_app->licence_for=$request->licence;
        $lease_app->location=$request->location;
        $lease_app->covered_area=$request->covered_area;
        $lease_app->District_id=$request->district;
        $lease_app->Tehsil_id=$request->tehsil;
        $lease_app->user_id=$user_id;
        $lease_app->company_id=$company->id;
        $lease_app->application_status="incomplete";
        $lease_app->challan_form="";
        $lease_app->save();
        $lastInsertedId = $lease_app->id;
        return redirect()->route('new_applications.addcoordinates', ['app_id' => $lastInsertedId])->with('status','Your Challan has been uploaded successfully');
    }

    public function addcoordinates($app_id){

            $loginuser = auth()->user();
            $user_id =$loginuser->id;
            $email =$loginuser->email;
           // $app_id =0 ;

            //$challan_fee = ChallansGenerated::where('qr_code', $request->input('qr_code'))->firstOrFail();
            $user_application = LeaseApplicationRegistrations::where('id', $app_id)->firstOrFail();
           // dd($user_application);
            $districtId = $user_application->District_id;
            //dd($districtId);
            $companyId=null;
           // dd($districtId);
            /// get complete data of the applicant for director  //

            $applicantCompleteData = DB::table('users')
            ->join('lease_application_registrations', 'users.id', '=', 'lease_application_registrations.user_id')
            ->join('companies', 'lease_application_registrations.company_id', '=', 'companies.id')
            ->select('users.*','lease_application_registrations.*','companies.id as companyid','companies.*','lease_application_registrations.id as applicationid')
            ->where('users.id', '=', $user_id)
            ->get();



        $applicantData = DB::table('users')
        ->join('lease_application_registrations', 'users.id', '=', 'lease_application_registrations.user_id')
        ->join('companies', 'lease_application_registrations.company_id', '=', 'companies.id')

        ->select('users.*','lease_application_registrations.*','companies.*')
        ->where('users.name', '=', $user_id)
        ->get();

            // Assuming there is at least one result
            if ($applicantCompleteData->isNotEmpty()) {
                $companyId = $applicantCompleteData[0]->companyid;
                // Now you can use $companyId as needed
            }


            $polygonData = [];

            $coordinatesApplied = DB::select("SELECT ST_AsText(polygon_data) as geo, polygons.id as polygonid, district_id as district, 'APPLIED' as applied, companies.company_name as company FROM polygons inner join companies on companies.id = polygons.company_id");
            $coordinatesExisting = DB::select("SELECT ST_AsText(coordinates) as geo, polygon_id as polygonid, district as district, status as applied, company_name as company  FROM company_polygons");
           
            $polygonData = array_merge($coordinatesExisting, $coordinatesApplied);
        return view('admin.new_applications.addcoordinates',['applicantdata'=>$applicantData,'applicantcompleteData'=>$applicantCompleteData,'appid'=>$app_id,'company_id'=>$companyId,'districtid'=>$districtId,'email'=>$email],compact('polygonData'));
    }

    public function savePolygon(Request $request){


        // Validate the incoming data
  $request->validate([
      'polygon' => 'required',
      'appid' => 'required|integer',
      'companyid' => 'required|integer',
      'districtid' => 'required|integer'
  ]);

  $polygonString = $request->input('polygon'); // Get the polygon string
       // Convert polygon string to WKT format
      $wktPolygon = 'POLYGON(('.$polygonString.'))';
      // Retrieve the input data

      $appid = $request->input('appid'); // Get application ID
      $company_id = $request->input('companyid'); // Get company ID
      $district_id = $request->input('districtid'); // Get district ID

      // return response()->json([
      //     'success' => true,
      //     'message' => 'i am here',
      //     'coordinates' => $polygonString
      // ]);


     // $wktPolygon = convertToWKT($polygonString);

        // Insert the polygon into the database
  DB::table('polygons')->insert([
      'company_id' => $company_id,
      'application_id' => $appid,
      'district_id' => $district_id,
      'polygon_data' => DB::raw("ST_GeomFromText('$wktPolygon')"),
  ]);

  $app_status_update=LeaseApplicationRegistrations::where("id",$appid)->firstOrFail();
  $app_status_update->coor_added=1;
  $app_status_update->save();
  session()->flash('status', 'Your coordinates have been added successfully');

  // Return JSON response
  return response()->json([
      'success' => true,
      'message' => 'Your coordinates have been added successfully',
      'coordinates' => $polygonString
  ]);
  }

  public function generate_challans($app_id){
        $user=Auth::user();
        $email=$user->email;
    return view('admin.new_applications.generate_challans',['app_id'=>$app_id,'email'=>$email]);
  }
  public function browsechallan($app_id){
        $user = auth()->user();
        $user_id =$user->id;
        $email=$user->email;
        $applicantData = DB::table('users')
                    ->join('lease_application_registrations', 'users.id', '=', 'lease_application_registrations.user_id')
                    ->join('companies', 'lease_application_registrations.company_id', '=', 'companies.id')
                    ->select('users.id as user_id','users.*','lease_application_registrations.*','companies.*','lease_application_registrations.id as application_id')
                    ->where('lease_application_registrations.id', '=', $app_id)
                    ->get();
     return view('admin.new_applications.browsechallan',['data'=>$applicantData,'email'=>$email]);
   }
   public function finish($app_id){
        $loginuser = auth()->user();
        $email=$loginuser->email;
        return view('admin.new_applications.finish',['email'=>$email]);
   }
}
