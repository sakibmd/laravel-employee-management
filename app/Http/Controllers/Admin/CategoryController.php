<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Employee;
use Carbon\Carbon;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name' => 'required|unique:categories',
           ]);
   
            
            $slug = str_slug($request->name);
            $category = new Category();
            $category->name = $request->name;
            $category->slug = $slug;
            $category->save();
            return redirect(route('admin.category.index'))->with('success', 'Category Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employees = Employee::where('category_id', '=', $id)->get();
        $category = Category::find($id);
        $now = Carbon::now();
        $now = $now->format('F Y');
        return view('admin.category.show', compact('employees', 'category','now'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.category.edit', ['category' => Category::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
           ]);
           
        $category = Category::find($id);
        $slug = str_slug($request->name);
        $category->name = $request->name;
        $category->slug = $slug;
        $category->save();
         return redirect(route('admin.category.index'))->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if(Employee::where('category_id', $id)->count() > 0){
            return redirect(route('admin.category.index'))->with('warning', 'You can not delete this category right now
            because there are some employees in this category');
        };
       
        $category = Category::find($id);
        $category->delete();
        return redirect(route('admin.category.index'))->with('success', 'Category Deleted Successfully');
    }

    public function showIndividualCategoryWiseRecord($id){
        $employee = Employee::find($id);
        return view('admin.category.detailsEmployee', compact('employee'));
    }
}
