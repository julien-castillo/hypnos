<?php

namespace Database\Seeders;

use App\Models\Suite;
use Illuminate\Database\Seeder;

class SuiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Suite::create([
            "name" => "Suite n°1",
            "price" => "100",
            "description" => "Lorem ipsum dolor sit amet",
            "cover" => "coverHotel/chaton-seed.jpg",
            "hotel_id" => 1
        ]);

        Suite::create([
            "name" => "Suite n°2",
            "price" => "200",
            "description" => "Lorem ipsum dolor sit amet",
            "cover" => "coverHotel/chaton-seed.jpg",
            "hotel_id" => 1

        ]);
        Suite::create([
            "name" => "Suite n°3",
            "price" => "300",
            "description" => "Lorem ipsum dolor sit amet",
            "cover" => "coverHotel/chaton-seed.jpg",
            "hotel_id" => 1

        ]);
    }
}
