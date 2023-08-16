<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new User([
           'email' => $row[0],
           'email_verified_at' => $row[1], 
           'password' => Hash::make($row[2]),
           'user_fname' => $row[3],
           'user_lname' => $row[4],
           'user_age' => $row[5],
           'user_contact' => $row[6],
           'user_address' => $row[7],
           'user_gender' => $row[8],
           'role' => $row[9],
        ]);
    }
}