<?php

namespace App\Http\Controllers\SubAdmin;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::latest()->get();
        return view('subadmin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('subadmin.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $this->validate($request,[
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
        //     'contact' => ['required', 'numeric', 'unique:employees'],
        //     'bin' => ['required', 'numeric', 'unique:employees'],
            
        //    ]);
  
 
        //     $employee = new Employee();
        //     $employee->login_no = $request->login_no;
        //     $employee->ref = $request->ref;
        //     $employee->remark = $request->remark;
        //     $employee->bin = $request->bin;
        //     $employee->bin_name = $request->bin_name;
        //     $employee->contact = $request->contact;
        //     $employee->work_month = $request->work_month;
        //     $employee->work_type = $request->work_type;
        //     $employee->address = $request->address;
        //     $employee->email = $request->email;
        //     $employee->save();
        //     return redirect(route('subadmin.employee.index'))->with('success', 'Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        // return view('subadmin.employee.show', compact('employee')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        // if(Auth::id() != 2){
        //     return redirect()->back();
        // }
        // return view('subadmin.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        // $employee->login_no = $request->login_no;
        // $employee->ref = $request->ref;
        // $employee->remark = $request->remark;
        // $employee->bin = $request->bin;
        // $employee->bin_name = $request->bin_name;
        // $employee->work_month = $request->work_month;
        // $employee->work_type = $request->work_type;
        // $employee->contact = $request->contact;
        // $employee->address = $request->address;
        // $employee->email = $request->email;
        // $employee->save();
        
        // //$e->update($request->all());
        // return redirect(route('subadmin.employee.index'))->with('success', 'Employee Edit Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        // if(Auth::id() != 2){
        //     return redirect()->back();
        // }
        
        // $employee->delete();
        //  return redirect(route('subadmin.employee.index'))->with('success', 'Employee Deleted Successfully');
    }
}
