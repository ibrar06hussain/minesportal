<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Models\LeaseApplicationCoordinates;
use App\Models\LeaseApplicationRegistrations;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\ApplicationComments;
use App\Models\ChallansGenerated;
use App\Models\ApplicationsForSurvey;
use GeoPhp\Geometry\Polygon;
use GeoPhp\GeoPHP;
use GeoPHP\Geometry;
//use geoPHP\geoPHP;
use App\Helpers\GeoPHPHelper; // Import the
use App\Http\Requests\ChallanUploadRequest;
use Milon\Barcode\DNS1D;
use Milon\Barcode\DNS2D;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class ChallanController extends Controller
{
    //  method for challan generation
    public function generate_challan($app_id) {

        $loginuser = auth()->user();
        $user_id =$loginuser->id;
        $user_email=$loginuser->email;
        //Adjust the width and height of the barcode here
        $barcodeWidth = 4;  // This controls the thickness of the barcode lines
        $barcodeHeight = 4;  // This controls the height of the barcode
        $randomAlphabets = Str::random(15);
        $barcode_generator = new DNS2D();
        $barcode1D = $barcode_generator->getBarcodeHTML($randomAlphabets, 'QRCODE', $barcodeWidth, $barcodeHeight);
        $applicantData = DB::table('lease_application_registrations')
    ->join('companies', 'lease_application_registrations.company_id', '=', 'companies.id')
    ->select(
        'lease_application_registrations.*',
        'companies.*','companies.id as company_id',
        DB::raw('(SELECT challan_fees.id FROM challan_fees WHERE challan_fees.id = 7) as fee_id'),
        DB::raw('(SELECT challan_fees.fee_title FROM challan_fees WHERE challan_fees.id = 7) as fee_title'),
        DB::raw('(SELECT challan_fees.bank_name FROM challan_fees WHERE challan_fees.id = 7) as bank_name'),
        DB::raw('(SELECT challan_fees.fee_amount FROM challan_fees WHERE challan_fees.id = 7) as fee_amount'),
        DB::raw('(SELECT challan_fees.fee_amount_in_words FROM challan_fees WHERE challan_fees.id = 7) as fee_amount_in_words'),
        DB::raw('(SELECT challan_fees.fee_account FROM challan_fees WHERE challan_fees.id = 7) as account_no')
        )
      // Assuming `user_id` exists in lease_application_registrations
    ->where('lease_application_registrations.id', '=', $app_id)
    ->get();
    // Random Voucher/Challan Number Logic
        $is_true=true;
        $voucher_no="";
        while( $is_true){
            $randomDigits = mt_rand(10000000, 99999999);
            $fixedDigits = '02';
            $voucher_no = $randomDigits . $fixedDigits . str_pad($applicantData[0]->District_id, 2, '0', STR_PAD_LEFT);
            $check_record=ChallansGenerated::where('challan_no',$voucher_no)->get();
            if( $check_record->count()==0){
                $is_true=false;
            }
        }
    // Random Voucher/Challan Number Logic
            $coordinates="";

             $coordinatesdata = DB::select("SELECT ST_AsText(polygon_data) as geo, id as polygonid, district_id as district, company_id as company FROM polygons where application_id =?",[$app_id]);

             if (!empty($coordinatesdata)) {
                $polygonWKT = $coordinatesdata[0]->geo; // Assuming you only have one polygon data

                // Remove the "POLYGON((" and "))" part of the WKT string
                $coordinates= str_replace(['POLYGON((', '))'], '', $polygonWKT);

         // dd($coordinates);

            }
         // Fetch challan details based on the ID
         $challanfee = DB::table('challan_fees')->select('challan_fees.*')
         ->where('challan_fees.id',7)->get();
        $data=['appid'=>$app_id, 'barcode'=>$barcode1D,'ranAl'=>$randomAlphabets
                ,'user_email'=>$user_email,'challanData'=>$applicantData,'coordinates'=>$coordinates,'voucher_no'=>$voucher_no];
            //dd($data);
        $pdf=Pdf::loadView('admin.challans.generate_challan',$data)->setPaper('a3','landscape');
        $file_name='registration_challan_'.$app_id.'_'.time().'.pdf';
        $filepath='public/asset/challans/'.$file_name;
       // Storage::put($filepath,$pdf->output());
        $success = Storage::put($filepath, $pdf->output()); // Store the PDF
        if ($success) {
            $challan = new ChallansGenerated();
            $challan->application_id = $app_id;
            $challan->qr_code = $randomAlphabets;
            $challan->account_title = $applicantData[0]->bank_name;
            $challan->challan_fee_id = $applicantData[0]->fee_id;
            $challan->type_of_concession = $applicantData[0]->licence_for;
            $challan->company_id = $applicantData[0]->company_id;
            $challan->account_no = $applicantData[0]->account_no;
            $challan->challan_file_path = $file_name;
            $challan->challan_no = $voucher_no;
            $challan->save();
            $app_status_update=LeaseApplicationRegistrations::where("id",$app_id)->firstOrFail();
            $app_status_update->challan_added=1;
            $app_status_update->save();
            session()->flash('status', 'Challan generated successfully.');
        } else {
            return response()->json(['message' => 'Failed to save PDF'], 500);
        }
        return $pdf->download($file_name);
    }


    public function browse_challan($app_id){
        $app_id = $app_id;
        $loginuser = auth()->user();
        $user_id =$loginuser->id;
        $applicantData = DB::table('users')
                    ->join('lease_application_registrations', 'users.id', '=', 'lease_application_registrations.user_id')
                    ->join('companies', 'lease_application_registrations.company_id', '=', 'companies.id')
                    ->select('users.id as user_id','users.*','lease_application_registrations.*','companies.*','lease_application_registrations.id as application_id')
                    ->where('lease_application_registrations.id', '=', $app_id)
                    ->get();

        return view("admin.challans.browse_challan",['data'=>$applicantData]);
    }

    public function challan_upload(ChallanUploadRequest $request){
        $generated_challan_update=ChallansGenerated::where('application_id',$request->application_id)->FirstOrFail();
        $generated_challan_update->fee_paid=50000;
        $generated_challan_update->fee_paid_on=$request->fee_paid_on;
        $generated_challan_update->bank_receipt_no=$request->bank_receipt_no;
        $app_status_update=LeaseApplicationRegistrations::where("id",$request->application_id)->firstOrFail();
        $app_status_update->challan_uploaded=1;
        $file = $request->file('challan_form');
        $mimeType = $file->getMimeType();
        // Handle file upload
        if ($request->hasFile('challan_form') && strstr($mimeType, "image/")) {
            // Store the file and get the file path
            $challan_path = $request->file('challan_form')->store('images/challans', 'public_uploads');
            $challanImagePath = 'uploads/images/challans/' . basename($challan_path);
            $challanImage = Image::make($request->file('challan_form'));
            Storage::disk('public')->put($challanImagePath, (string) $challanImage->encode());
            // Update the database record
            $update = DB::table('lease_application_registrations')
                ->where('id', $request->application_id)
                ->update([
                    'challan_form' => $challanImagePath,
                    'challan_date' => Carbon::now(),
                    'application_status' => 'complete', // Change the application status to incomplete for now
                ]);

            // Check if the update was successful
            if ($update) {
                // Redirect to a success page or another route
                $generated_challan_update->save();
                $app_status_update->save();
                // Insert a new record
                ApplicationsForSurvey::create([                // Replace with actual survey ID
                    'application_id' => $request->application_id,       // Replace with actual application ID
                    'sent_by' => $app_status_update->user_id,           // Replace with the actual person who sent it
                    'sent_on' => now(),                // Current timestamp
                    'survey_completed' => 0,        // Status of survey completion
                    'survey_completed_date' => null,   // Leave as null if not completed
                    'survey_conducted_by' => null // Replace with the survey conductor's name
                ]);
                return redirect()->route('new_applications.finish', ['app_id' => $request->application_id]);
            } else {
                // Handle the case where the update failed
                return Redirect::back()->withErrors(['update_error' => 'Failed to update the application.']);
            }
        }
        elseif ($mimeType === 'application/pdf') {
            // The file is a PDF, store it directly without image processing
            $pdfPath = 'uploads/pdfs/' . uniqid() . '.' . $file->getClientOriginalExtension();
            $challan_path = $request->file('challan_form')->store('images/challans', 'public_uploads');
            $challanImagePath = 'uploads/images/challans/' . basename($challan_path);
            //Storage::disk('public')->put($challanImagePath, (string) $challanImage->encode());
            Storage::disk('public')->put($challanImagePath, file_get_contents($file));
            // Update the database record
            $update = DB::table('lease_application_registrations')
            ->where('id', $request->application_id)
            ->update([
                'challan_form' => $challanImagePath,
                'challan_date' => Carbon::now(),
                'application_status' => 'complete', // Change the application status to incomplete for now
            ]);

   // Check if the update was successful
   if ($update) {
            $generated_challan_update->save();
            $app_status_update->save();
            ApplicationsForSurvey::create([                // Replace with actual survey ID
                'application_id' => $request->application_id,       // Replace with actual application ID
                'sent_by' => $app_status_update->user_id,           // Replace with the actual person who sent it
                'sent_on' => now(),                // Current timestamp
                'survey_completed' => 0,        // Status of survey completion
                'survey_completed_date' => null,   // Leave as null if not completed
                'survey_conducted_by' => null // Replace with the survey conductor's name
            ]);
            // Redirect to a success page or another route
            return redirect()->route('new_applications.finish', ['app_id' => $request->application_id]);
   } else {
       // Handle the case where the update failed
       return Redirect::back()->withErrors(['update_error' => 'Failed to update the application.']);
   }
        }

        else {
            // Handle the case where the file upload failed
            return Redirect::back()->withErrors(['file_error' => 'Failed to upload the file.']);
        }
    }


    /*Download & Print Challan Form */

    public function download_challan($app_id){
        $challan=ChallansGenerated::where('application_id',$app_id)->FirstOrFail();
       $file_path = 'app/public/asset/challans/' . $challan->challan_file_path;
       $my_file=storage_path($file_path);
       return response()->download($my_file);
    }
}
