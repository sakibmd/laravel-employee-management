<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Record;

class SearchController extends Controller
{
    public function search(Request $request){
        $query = $request->input('query');
        //$result = Employee::where('contact','LIKE',"$query")->orWhere('bin', '=', $query)->get();
        $record = Record::latest()->where('contact','LIKE',"$query")->orWhere('bin', '=', $query)->get();
        return view('search', compact('query', 'record'));
    }
}
