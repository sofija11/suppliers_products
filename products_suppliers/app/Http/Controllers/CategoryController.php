<?php

namespace App\Http\Controllers;

use App\Imports\CategoryImport;
use Maatwebsite\Excel\Facades\Excel;

class CategoryController extends Controller
{
    public function importCategory() 
    {
        Excel::import(new CategoryImport, 'suppliers.csv');
        
        return redirect('/')->with('success', 'All good!');
    }

}
