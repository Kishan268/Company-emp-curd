<?php

namespace App\Exports;

use App\User;
use App\CompanyModel;
use App\EmployeesModel;

use Maatwebsite\Excel\Concerns\FromCollection;

class CompaniesExport implements FromCollection
{
    public function collection()
    {
        // $data= CompanyModel::all();
        // dd($data);

        return CompanyModel::all();
    }
}
