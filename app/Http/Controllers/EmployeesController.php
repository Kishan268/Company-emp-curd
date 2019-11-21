<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\CompanyModel;
use App\EmployeesModel;
use Illuminate\Support\Facades\DB;

class EmployeesController extends Controller
{
    
    public function index()
    {
    }
    
    public function create()
    {
       $users = CompanyModel::get();
        return view('Employees.index',compact('users')); 
            
    }
    
    public function store(Request $request)
    {
        $data = $request->validate(['first_name'=>'required','last_name'=>'required','company_id'=>'required','email'=>'required','phone'=>'required']);
        $data1 = EmployeesModel::create($data);

        if ($data1) {
        return redirect()->back()->with('message', 'Employee added successfully');
        }else{
        return redirect()->back()->with('messageError', 'Employees Not added');

        }
    }

   
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $users = EmployeesModel::where('id',$id)->get();
        $company = CompanyModel::get();
        // $companyname = CompanyModel::get('id',$id);
        return view('Employees.update',compact('users','company'));
    }

    public function update(Request $request)
    {
        $id =$request->id;
        $data = $request->validate(['first_name'=>'required','last_name'=>'required','email'=>'required','phone'=>'required','company_id'=>'required']);
        
        $data1 = EmployeesModel::where('id', $id)->update($data); 
        
        if ($data1) {
        return redirect()->back()->with('message', 'Employee updated successfully');
        }else{
        return redirect()->back()->with('messageError', 'Employee Not updated');

        }
    }

    
    public function destroy($id)
    {
        $user = EmployeesModel::find($id)->delete();
        $users = EmployeesModel::all();
        return view('home',compact('users'));
    }
}
