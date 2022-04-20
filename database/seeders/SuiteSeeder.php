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
            "name" => "Valréas",
            "price" => "300",
            "description" => "La Valréas est comporte une suite parentale avec baignoire et douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "cover/1650447726-room1.jpg",
            "hotel_id" => 1
        ]);

        Suite::create([
            "name" => "Nyons",
            "price" => "400",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "cover/1650447833-room2.jpg",
            "hotel_id" => 1
        ]);
        Suite::create([
            "name" => "Chamonix",
            "price" => "300",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 2
        ]);
        Suite::create([
            "name" => "Marmotte",
            "price" => "350",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 2
        ]);
        Suite::create([
            "name" => "Morgan Freeman",
            "price" => "450",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 3
        ]);
        Suite::create([
            "name" => "Tom Hanks",
            "price" => "400",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 3
        ]);
        Suite::create([
            "name" => "Petite Basque",
            "price" => "300",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 4
        ]);
        Suite::create([
            "name" => "Etcheverry",
            "price" => "350",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 4
        ]);
        Suite::create([
            "name" => "Kouign Amann",
            "price" => "350",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 5
        ]);
        Suite::create([
            "name" => "Corsaire",
            "price" => "350",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 5
        ]);
        Suite::create([
            "name" => "Chardonnay",
            "price" => "350",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 6
        ]);
        Suite::create([
            "name" => "Pinot Noir",
            "price" => "350",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 6
        ]);
        Suite::create([
            "name" => "Porte d'Aude",
            "price" => "350",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 7
        ]);
        Suite::create([
            "name" => "Porte Narbonnaise",
            "price" => "350",
            "description" => "Cette suite comporte une suite parentale avec jaccuzzi privatif ainsi qu'une douche à l'italienne, une seconde chambre équipée de sa salle de douche privative et d'un salon.",
            "cover" => "",
            "hotel_id" => 7
        ]);
    }
}
