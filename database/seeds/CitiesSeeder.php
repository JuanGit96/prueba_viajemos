<?php

use App\City;
use Illuminate\Database\Seeder;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::create([
            "name" => "New York",
            "latitude" => "40.7142715",
            "longitude" => "-74.0059662",
        ]);

        City::create([
            "name" => "Miami",
            "latitude" => "25.7742691",
            "longitude" => "-80.1936569",
        ]);

        City::create([
            "name" => "Orlando",
            "latitude" => "28.5383396",
            "longitude" => "-81.3792419",
        ]);
    }
}
