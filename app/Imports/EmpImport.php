<?php

namespace App\Imports;
use App\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use App\EmployeesModel;

class EmpImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new EmployeesModel([
           'id'     => $row[0],
           'first_name'    => $row[1], 
           'last_name' => $row[2],
           'company_id' => $row[3],
           'email' => $row[4],
           'phone' => $row[5],

        ]);
    }
}
