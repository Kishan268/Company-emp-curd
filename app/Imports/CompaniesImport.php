<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use App\CompanyModel;

class CompaniesImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        // return new EmployeesModel([
        //    'name'     => $row[0],
        //    'email'    => $row[1], 
        //    'password' => Hash::make($row[2]),
        // ]);

        return new CompanyModel([
           // 'id'     => $row[0],
           'name'    => $row[1], 
           'email' => $row[2],
           'logo' => $row[3],
           'website' => $row[4],
           ]);
    }
}
