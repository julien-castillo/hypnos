<?php

namespace Database\Seeders;

use App\Models\Hotel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class HotelSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
            Hotel::create([
                "name" => "Hôtel du chat",
                "city" => "Arcachon",
                "address" => "9, route de la plage",
                "description" => "Lorem ipsum dolor sit amet",
                "image_path" => "chaton-seed.jpg"
            ]);
            Hotel::create([
                "name" => "Hôtel des chips",
                "city" => "ChipsLand",
                "address" => "10 routes des frites",
                "description" => "Lorem ipsum dolor sit amet",
                "image_path" => "chaton-seed.jpg"
            ]);
        }
    }
