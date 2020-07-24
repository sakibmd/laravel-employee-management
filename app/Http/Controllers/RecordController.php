<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Record;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RecordController extends Controller
{
    public function storeRecord(Request $request){
        $this->validate($request,[
            'submission_id' => ['required'],
        ]);

        $employeeId = $request->id;
        $employeeIdRow = Employee::find($employeeId);
        $employeeIdRowContact = $employeeIdRow->contact;
        //dd($employeeIdRowContact);
        

        $subbmission_id = $request->submission_id;
        $bin = $request->bin;
        $now = Carbon::now();
        $now = $now->format('M Y');
        //dd($now);

        $existingOrNot = Record::where('bin', '=', $bin)->get();
        $flag = 0;
        if($existingOrNot->count() > 0){
            foreach ($existingOrNot as $row) {
                if( ($row->where('monthNyear', '=', $now)->count()) > 0 ){
                    $flag = 1;
                }
            }
        }
         //dd($flag);
         
         if($flag == 0) {
            $url = "http://66.45.237.70/api.php";
            $number= $employeeIdRowContact;
            $text="
Dear M/S.ALIF TRADE LINK (BIN: $bin),

We would like to inform you that your Value Added Tax Return filing for tax period June, 2020 has been completed.

If you need further support, please contact the Contact Center at 16555 and mention your Submission ID: $subbmission_id

Thanks for your support.

Best Regards,

Tareque Hassan";
            $data= array(
                'username'=>"01713301190",
                'password'=>"69C7DTG4",
                'number'=> $number,
                'message'=>"$text"
            );

            print_r($data);

            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
            $p = explode("|",$smsresult);
            $sendstatus = $p[0];


            $employeeIdRow->last_sms_date = $now;
            $employeeIdRow->save();
            $record = new Record();
            $record->submission_id = $subbmission_id;
            $record->bin = $bin;
            $record->contact = $employeeIdRowContact;
            $record->monthNyear = $now;
            $record->save();

            return redirect()->back()->with('success', 'Submission Id Send Successfully');

         }else{
            return redirect()->back()->with('warning', 'The submission id of this user is already sent for this month');
         }
    }
}
