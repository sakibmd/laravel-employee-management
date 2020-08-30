<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;

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
        return view('admin.employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.employee.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        
        $this->validate($request,[
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employees'],
            'contact' => ['required', 'numeric', 'unique:employees'],
            'bin' => ['required', 'numeric', 'unique:employees'],
            'category_id' => ['required'],
            'bin_name' => ['required'],
            'address' => ['required'],
            'login_no' => ['required'],
           ]);
  
 
            $employee = new Employee();
            $employee->login_no = $request->login_no;
            $employee->category_id = $request->category_id;
            $employee->ref = $request->ref;
            $employee->remark = $request->remark;
            $employee->bin = $request->bin;
            $employee->bin_name = $request->bin_name;
            $employee->contact = $request->contact;
            $employee->work_month = $request->work_month;
            $employee->work_type = $request->work_type;
            $employee->address = $request->address;
            $employee->email = $request->email;
            $employee->save();
            return redirect(route('admin.employee.index'))->with('success', 'Employee Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('admin.employee.show', compact('employee')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        if(Auth::id() != 1){
            return redirect()->back();
        }
        $categories = Category::all();
        return view('admin.employee.edit', compact('employee', 'categories'));
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
        $this->validate($request,[
            'email' => 'required|email|unique:employees,email,'.$employee->id,
            'contact' => 'required|numeric|unique:employees,contact,'.$employee->id,
            'bin' => 'required|numeric|unique:employees,bin,'.$employee->id,
            'category_id' => ['required'],
            'bin_name' => ['required'],
            'address' => ['required'],
            'login_no' => ['required'],
           ]);
           
            $employee->login_no = $request->login_no;
            $employee->email = $request->email;
            $employee->contact = $request->contact;
            $employee->bin = $request->bin;
            $employee->ref = $request->ref;
            $employee->category_id = $request->category_id;
            $employee->remark = $request->remark;
            $employee->bin_name = $request->bin_name;
            $employee->work_month = $request->work_month;
            $employee->work_type = $request->work_type;
            $employee->address = $request->address;
            $employee->save();
            //$e->update($request->all());
            return redirect(route('admin.employee.index'))->with('success', 'Employee Edit Successfully');
    }


  

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        if(Auth::id() != 1){
            return redirect()->back();
        }
        return redirect(route('admin.employee.index'))->with('success', 'Employee Deleted Successfully');
    }
}
