<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UsersSeeder extends Seeder
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
            DB::table('users')->insert([
                'user_fname' => $faker->firstName($gender = 'other'|'male'|'female'),
                'user_lname' => $faker->lastName(), 
                'user_age' => $fakey->numberBetween($min = 19, $max = 50);
                'user_contact' => $faker->phoneNumber(),
                'user_address' => $faker->address(),
                'user_picture' => $faker->imageUrl($width = 640, $height = 480),
                'user_gender'=>$faker->randomElement($array = array ('Male','Female')),
                'role'=> 'new',
            ]);
    }
    }
}
