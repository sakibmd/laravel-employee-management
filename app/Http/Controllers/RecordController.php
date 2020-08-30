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

        //dd($request->all());
        $employeeSubmissionId = $request->submission_id;
        $employeeId = $request->id;
        $employeeIdFullRow = Employee::find($employeeId);

        $employeeBinName = $employeeIdFullRow->bin_name;
        $employeeIdContact = $employeeIdFullRow->contact;
        $employeeBin = $employeeIdFullRow->bin;
       
        
        //dd($employeeIdContact);
       
        $now = Carbon::now();
        $now = $now->format('F Y');
        //dd($now);


        $existingOrNot = Record::where('bin', '=', $employeeBin)->get();
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
            $number= $employeeIdContact;
            $text="
Dear $employeeBinName (BIN: $employeeBin),

We would like to inform you that your Value Added Tax Return filing for tax period $now has been completed.

If you need further support, please contact the Contact Center at 16555 and mention your Submission ID: $employeeSubmissionId

Thanks for your support.

Best Regards,

Tareque Hassan";
            $data= array(
                'username'=>"01713301190", //enter your sms provider accounts username
                'password'=>"69C7DTG4", //enter your sms provider accounts passowrd
                'number'=> $number,
                'message'=>$text
            );

            $ch = curl_init(); // Initialize cURL
            curl_setopt($ch, CURLOPT_URL,$url);
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $smsresult = curl_exec($ch);
            $p = explode("|",$smsresult);
            $sendstatus = $p[0];


            $employeeIdFullRow->last_sms_date = $now;
            $employeeIdFullRow->save();
            $record = new Record();
            $record->submission_id = $employeeSubmissionId;
            $record->bin = $employeeBin;
            $record->contact = $employeeIdContact;
            $record->bin_name = $employeeBinName;
            $record->monthNyear = $now;
            $record->save();

            return redirect()->back()->with('success', 'Submission Id Send Successfully');

         }else{
            return redirect()->back()->with('warning', 'The submission id of this user is already sent for this month');
         }
    }
}
