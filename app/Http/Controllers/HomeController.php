<?php

namespace App\Http\Controllers;
use Log;
use Exception;
use Carbon\Carbon;
use App\Models\Nation;
use App\Models\Slider;
use Illuminate\Http\Request;
use App\Models\CompanyPolygon;
use App\Models\DistrictBoundary;
use App\Models\StudyAreaPolygon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use App\Mail\UserNotificationMail;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //dd('asjhdajhs');


        $districts = DB::table('district_boundries')->get();
        //dd($districts);
        $studyAreas = DB::table('study_area_polygons')->get();
        //dd($studyAreas);

        $companyPolygons = DB::table('company_polygons')->get();
      //  dd($companyPolygons);


            // Convert the polygons to a format usable by Leaflet (array of coordinates)
            $districtData = [];
            foreach ($districts as $polygon) {
                $coordinates = DB::select("SELECT ST_AsText(p.boundary_polygon) as geo, p.district_id as polygonid
                 FROM district_boundries  p
                 WHERE p.district_boundary_id = ?", [$polygon->district_boundary_id]);
                $districtData[] = $coordinates;
            }

             // Convert the polygons to a format usable by Leaflet (array of coordinates)
             //study_area_name, study_area_district, study_area_village, mineral_name, polygon_data
             $studyAreasData = [];
             foreach ($studyAreas as $polygon) {
                 $coordinates = DB::select("SELECT ST_AsText(p.polygon_data) as geo, p.study_area_name as polygonid,
                  study_area_district as district, study_area_village as village, mineral_name as mineral
                  FROM study_area_polygons  p
                  WHERE p.study_area_id = ?", [$polygon->study_area_id]);
                 $studyAreasData[] = $coordinates;
             }

              // Convert the polygons to a format usable by Leaflet (array of coordinates)
              // company_name, mineral_name, description, district, status, granted_date, coordinates, contact, address, area, scale, tanure
            $companyPolygonsData = [];
            foreach ($companyPolygons as $polygon) {
                $coordinates = DB::select("SELECT ST_AsText(p.coordinates) as geo, p.mineral_name as polygonid, p.status as grantstatus,company_name,
                                                  description, district, granted_date,contact, address, area, scale, tanure
                 FROM company_polygons  p
                 WHERE p.polygon_id = ?", [$polygon->polygon_id]);
                $companyPolygonsData[] = $coordinates;
            }

        $slider=Slider::get();
        return view('home.index',['slider'=>$slider,'districts'=>$districtData,  'studyAreas'=>$studyAreasData, 'companyPolygons'=>$companyPolygonsData]);
    }

            public function register(){
                $districts = DB::table('areas')
                                ->select('District', 'DistrictName')
                                ->distinct()
                                ->get();
                $nations=Nation::get();
                return view('home.register', compact('districts','nations'));
            }


            public function register_post(Request $request){



                        $validator = Validator::make($request->all(),[
                            'nationality' => 'required|string|max:255',
                            'authorize_person' => 'required|string|max:255',
                            'designation' => 'required|string|max:50|',
                            'office_no' => 'nullable|string|regex:/^\+?[0-9]{1,15}$/',
                            'cell_no' => 'required|string|regex:/^\+?[0-9]{1,15}$/',
                            'company_name' => 'required|string|max:150',
                            'business_address' => 'required|string|max:255',
                            'nature_business' => 'required|string|max:150',
                            'firm_registration' => 'required|file|mimes:pdf,jpg,png',
                            'deed_partnership' => 'required|file|mimes:pdf,jpg,png',
                            'password' => 'required|string|min:8|confirmed',
                            'email' => 'required|string|email|max:255|unique:users',
                            'ntn_no' => 'nullable|string|max:30',  // Add validation rule here
                            'gst_no' => 'nullable|string|max:30',
                            'cnic' => 'required|string|max:30',


                        ]);
                    // echo "test80"; exit;
                        if ($validator->fails()) {

                        return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
                    }

                        if($validator->passes()) {
                        $firm_registration_path = $request->file('firm_registration')->store('companydocuments', 'public_uploads');
                        $deed_partnership_path = $request->file('deed_partnership')->store('companydocuments', 'public_uploads');
                        //dd($request);
                        try {
                    $leaseApplicationID = DB::select("CALL CreateLeaseApplication(?,?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)", [
                        $request->cnic,

                       // $request->district,
                       // $request->tehsil,
                        1, // user_role
                        Hash::make($request->password),
                        $request->email,
                        $request->authorize_person,
                        $request->designation,
                        $request->office_no,
                        "incomplete", //application status code
                        $request->cell_no,
                        $request->company_name,
                        $request->business_address,
                        $request->ntn_no,
                        $request->gst_no,
                        $request->nature_business,
                        $firm_registration_path,
                        $deed_partnership_path,
                        $request->nationality,
                       // $request->location,
                       // $request->covered_area,
                    // $longitudesStr,
                    // $latitudesStr,
                       // $request->licence,
                    ]);
                } catch (\Exception $e) {
                    return back()->withErrors(['error' => $e->getMessage()]);
                }
                //dd($leaseApplicationID);
                $leaseApplicationID = $leaseApplicationID[0]->LeaseApplicationID;
                // $credentials = [
                //     'name' =>$request->email,
                //     'password' => $request->password
                // ];

                // if (Auth::attempt($credentials)) {
                //     return redirect()->route('user.applications', ['email' => $request->email]);
                // }
                Mail::to($request->email)->queue(new UserNotificationMail($request->email));
                return redirect()->route('home.success', ['email'=>$request->email]);
                }
            }


public function uploadchallan(Request $request)
    {
        // Validate the request (e.g., ensure the file is present)
        $request->validate([
            'application_id' => 'required|integer',
            'challan_form' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:2048',
        ]);

        // Handle file upload
        if ($request->hasFile('challan_form')) {
            $challan_path = $request->file('challan_form')->store('uploads/images/challans', 'public');
            dd($challan_path);
            // Update the database record
            $update = DB::table('lease_application_registrations')
                ->where('id', $request->application_id)
                ->update([
                    'challan_form' => $challan_path,
                    'challan_date' => Carbon::now(),
                    'application_status' => 'complete', // Change the application status to incomplete for now
                ]);

            // Check if the update was successful
            if ($update) {
                // Redirect to a success page or another route
                return redirect()->route('user.applications', ['user_name' => $request->user_name ?? 'default_user']);
            } else {
                // Handle the case where the update failed
                return Redirect::back()->withErrors(['update_error' => 'Failed to update the application.']);
            }
        } else {
            // Handle the case where the file upload failed
            return Redirect::back()->withErrors(['file_error' => 'Failed to upload the file.']);
        }
    }


// to display the districts in view
public function showDropdowns()
        {
            $districts = DB::table('areas')
                        ->select('District', 'DistrictName')
                        ->distinct()
                        ->get();

            return view('home.register', compact('districts'));
        }

public function success(Request $request)
{
    return view('home.success',['email'=>$request->email]);
}

public function company(){
    return view('home.company');
}
public function add_company(){
    return view('home.add_company');
}
/*----Home page LINKS---- */
// Downloads
public function downloads(){
    return view('home.downloads');
}
// maps
public function interactivemap(Request $request)
{
    $districts = DB::table('district_boundries')->get();
    //dd($districts);
    $studyAreas = DB::table('study_area_polygons')->get();
    //dd($studyAreas);

    $companyPolygons = DB::table('company_polygons')->get();
    $minerals = DB::table('categories')->where('parent_id', 1)->get();
  //  dd($companyPolygons);


        // Convert the polygons to a format usable by Leaflet (array of coordinates)
        $districtData = [];
        foreach ($districts as $polygon) {
            $coordinates = DB::select("SELECT ST_AsText(p.boundary_polygon) as geo, p.district_id as polygonid
             FROM district_boundries  p
             WHERE p.district_boundary_id = ?", [$polygon->district_boundary_id]);
            $districtData[] = $coordinates;
        }

         // Convert the polygons to a format usable by Leaflet (array of coordinates)
         //study_area_name, study_area_district, study_area_village, mineral_name, polygon_data
         $studyAreasData = [];
         foreach ($studyAreas as $polygon) {
             $coordinates = DB::select("SELECT ST_AsText(p.polygon_data) as geo, p.study_area_name as polygonid,
              study_area_district as district, study_area_village as village, mineral_name as mineral
              FROM study_area_polygons  p
              WHERE p.study_area_id = ?", [$polygon->study_area_id]);
             $studyAreasData[] = $coordinates;
         }

          // Convert the polygons to a format usable by Leaflet (array of coordinates)
          // company_name, mineral_name, description, district, status, granted_date, coordinates, contact, address, area, scale, tanure
        $companyPolygonsData = [];
        foreach ($companyPolygons as $polygon) {
            $coordinates = DB::select("SELECT ST_AsText(p.coordinates) as geo, p.mineral_name as polygonid, p.mineral_name as mineral,p.status as grantstatus,company_name,
                                              description, district, granted_date,contact, address, area, scale, tanure
             FROM company_polygons  p
             WHERE p.polygon_id = ?", [$polygon->polygon_id]);
            $companyPolygonsData[] = $coordinates;
        }

  
    return view('home.interactivemap',['districts'=>$districtData,  'studyAreas'=>$studyAreasData, 'companyPolygons'=>$companyPolygonsData,'minerals'=>$minerals]);

   
}
// process guidelines
public function guidelines(){
    return view('home.guidelines');
}
// process concession rules
public function concessionrules(){
    return view('home.concession-rules');
}
// process concession rules
public function leaseholders(){
    return view('home.lease-holders');
}
/*----Home page LINKS---- */
}
