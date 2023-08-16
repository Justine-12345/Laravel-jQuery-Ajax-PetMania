<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class AdopterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $faker = Faker::create();
        foreach (range(1, 20) as $index) 
    {
            DB::table('adopters')->insert([
                'adopter_fname' => $faker->firstName($gender = 'other'|'male'|'female'),
                'adopter_lname' => $faker->lastName(), 
                'adopter_contact' => $faker->phoneNumber(),
                'adopter_address' => $faker->address(),
            ]);
    }
    }
}
