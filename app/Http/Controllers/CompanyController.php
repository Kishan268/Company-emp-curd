<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\CompanyModel;
use App\EmployeesModel;

class CompanyController extends Controller
{
    public function index()
    {
    }

    
    public function create()
    {
       return view('Company.index'); 
        
    }

   
    public function store(Request $request)
    {
        $data = $request->validate(['name'=>'required','email'=>'required','logo'=>'required|image|mimes:jpeg,png,jpg,gif|max:100','website'=>'required']);
        $filename = $request->file('logo')->getClientOriginalName();
                $extension = $request->file('logo')->getClientOriginalExtension();
                $fileNameToStore = $filename;              
                $path = $request->file('logo')->storeAs('public/images',$fileNameToStore);
                $data['logo'] = $fileNameToStore;

        $data1 = CompanyModel::create($data);
        if ($data1) {
        return redirect()->back()->with('message', 'Company add successfully');
        }else{
        return redirect()->back()->with('messageError', 'Company Not added');

        }
    }

    public function show($id)
    {
        $users = EmployeesModel::where('company_id',$id)->simplePaginate(10);
        return view('Employees.show-emp',compact('users'));
        
        
        
    }

    public function edit($id)
    {
        $users = CompanyModel::where('id',$id)->get();
        return view('Company.update',compact('users'));

    }
 
    public function update(Request $request)
    {   
        $id =$request->id;
        $data = $request->validate(['name'=>'required','email'=>'required','website'=>'required']);
        if($request->hasFile('logo')){
            $filename = $request->file('logo')->getClientOriginalName();
                $extension = $request->file('logo')->getClientOriginalExtension();
                $fileNameToStore = $filename;              
                $path = $request->file('logo')->storeAs('public/images',$fileNameToStore);
                $data['logo'] = $fileNameToStore;          
        }
        else{
            $file  = CompanyModel::find($id);
            $data['logo'] = $file->logo;            
        }
        $data1 = CompanyModel::where('id', $id)->update($data); 
        
        if ($data1) {
        return redirect()->back()->with('message', 'Company updated successfully');
        }else{
        return redirect()->back()->with('messageError', 'Company Not updated');

        }
    }

    
    public function destroy($id)
    {
        $user = CompanyModel::find($id)->delete();
        $users = CompanyModel::all();
        return view('home',compact('users'));

    }
}
