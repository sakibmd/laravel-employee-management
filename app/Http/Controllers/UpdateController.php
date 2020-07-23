<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Auth;

class UpdateController extends Controller
{
    public function changeContact(Request $request, $id)
    {
        
        //dd($id);

        if( (Auth::id() == 1) || (Auth::id() == 2)){
            $e = Employee::find($id);
            $this->validate($request,[
                'contact' => ['required', 'numeric', 'unique:employees'],
            ]);
            $e->contact = $request->contact;
            $e->save();
        }
       
        if(Auth::id() == 1){
            return redirect(route('admin.employee.show',$e->id))->with('success', 'Contact Updated Successfully');
        }else{
            return redirect(route('subadmin.employee.show',$e->id))->with('success', 'Contact Updated Successfully');
        }

    }

    public function changeBin(Request $request, $id)
    {
        
        //dd($id);

        if( (Auth::id() == 1) || (Auth::id() == 2)){
            $e = Employee::find($id);
            $this->validate($request,[
                'bin' => ['required', 'numeric', 'unique:employees'],
            ]);
            $e->bin = $request->bin;
            $e->save();
        }


        if(Auth::id() == 1){
            return redirect(route('admin.employee.show',$e->id))->with('success', 'Bin Updated Successfully');
        }else{
            return redirect(route('subadmin.employee.show',$e->id))->with('success', 'Bin Updated Successfully');
        }


    }


    public function changeEmail(Request $request, $id)
    {
        
        //dd($id);

        if( (Auth::id() == 1) || (Auth::id() == 2)){
            $e = Employee::find($id);
            $this->validate($request,[
                'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            ]);
            $e->email = $request->email;
            $e->save();
        }

        if(Auth::id() == 1){
            return redirect(route('admin.employee.show',$e->id))->with('success', 'Email Updated Successfully');
        }else{
            return redirect(route('subadmin.employee.show',$e->id))->with('success', 'Email Updated Successfully');
        }
        
    }
}