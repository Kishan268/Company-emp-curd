<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\CompanyModel;
use App\Imports\CompaniesImport;
use App\EmployeesModel;

use Maatwebsite\Excel\Facades\Excel;
// use App\Http\Controllers\Controller;
use App\Exports\CompaniesExport;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $users = CompanyModel::simplePaginate(10);
        return view('home',compact('users'));

    }
    public function import() 
    {	
    	if (request()->file('file')) {
    		$file = request()->file('file');
        	Excel::import(new CompaniesImport,$file);
        	return redirect('/')->with('message', 'File uploaded successfully!');
    	}else{
    		return redirect('/')->with('messageError', 'Please Select File!');
    	}
    }

    public function export() 
    {
       return  Excel::download(new CompaniesExport, 'users.xlsx');
    }
}
