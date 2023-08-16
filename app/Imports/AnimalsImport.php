<?php

namespace App\Imports;

use App\Models\Animal;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class AnimalsImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return User|null
     */
    public function model(array $row)
    {
        return new Animal([
           'animal_name' => $row[0],
           'animal_gender' => $row[1],
           'animal_age' => $row[2],
           'animal_breed' => $row[3],
           'animal_health' => $row[4],
           'category_id' => $row[5],
        ]);
    }
}