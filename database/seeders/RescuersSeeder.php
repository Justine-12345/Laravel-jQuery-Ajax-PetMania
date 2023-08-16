<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class RescuersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 20) as $index) 
    {
            DB::table('rescuers')->insert([
                'rescuer_fname' => $faker->firstName($gender = 'other'|'male'|'female'),
                'rescuer_lname' => $faker->lastName(),
                'rescuer_age' => $faker->numberBetween($min = 18, $max = 35), 
                'rescuer_contact' => $faker->phoneNumber(),
                'rescuer_address' => $faker->address(),
                'rescuer_picture' => $faker->imageUrl($width = 640, $height = 480), 
            ]);
    }

    }
}
