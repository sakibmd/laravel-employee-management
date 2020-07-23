<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class SearchController extends Controller
{
    public function search(Request $request){
        $query = $request->input('query');
        $result = Employee::where('contact','LIKE',"$query")->get();
        return view('search', compact('result', 'query'));
    }
}
