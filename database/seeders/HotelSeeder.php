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
                "name" => "L'Olivier",
                "city" => "Saint-Pantaléon-les-Vignes",
                "address" => "9, route de la Picholine, 26770",
                "description" => "Cet établissement de luxe, situé au coeur de la Provence saura vous accueilir pour un séjour inoubliable. L'hôtel dispose d'une salle de sport, d'une piscine extérieure et intérieure, et d'un complexe sauna / hamam / spa. Certaines de nos suites sont équipées de spa privatif. N'hésitez pas à nous demander une prestation sur mesure par l'intermédiaure du formulaire de contact.",
                "image_path" => "olivier.jpg",
                "user_id" => 3
            ]);
            Hotel::create([
                "name" => "L'égarlette",
                "city" => "Megève",
                "address" => "77, avenue du Mont-Blanc, 74120",
                "description" => "Cet établissement haut de gamme, situé au coeur du massif du Mont-Blanc saura vous accueilir pour un séjour inoubliable. L'hôtel dispose d'une salle de sport, d'un piscine extérieure et intérieure, et d'un complexe sauna / hamam / spa. L'établissement est bien sûr situé au pied des pistes. Certaines de nos suites sont équipées de spa privatif. N'hésitez pas à nous demander une prestation sur mesure par l'intermédiaure du formulaire de contact.",
                "image_path" => "megeve.jpg",
                "user_id" => 4
            ]);
            Hotel::create([
                "name" => "La Palme",
                "city" => "Cannes",
                "address" => "38, avenue de la Croisette, 06400",
                "description" => "Cet établissement haut de gamme, situé sur la Croisette saura vous accueilir pour un séjour luxueux. L'hôtel dispose d'une salle de sport, d'une piscine extérieure et intérieure, et d'un complexe sauna / hamam / spa. L'établissement est bien sûr situé à deux pas du Palais des festivals. Certaines de nos suites sont équipées de spa privatif. N'hésitez pas à nous demander une prestation sur mesure par l'intermédiaure du formulaire de contact.",
                "image_path" => "cannes.jpg",
                "user_id" => 5
            ]);
            Hotel::create([
                "name" => "Le Pittoresque",
                "city" => "Saint-Jean-de-Luz",
                "address" => "38, avenue de la Croisette, 06400",
                "description" => "Cet établissement haut de gamme, situé sur la Croisette saura vous accueilir pour un séjour luxueux. L'hôtel dispose d'une salle de sport, d'une piscine extérieure et intérieure, et d'un complexe sauna / hamam / spa. L'établissement est bien sûr situé à deux pas du Palais des festivals.. Certaines de nos suites sont équipées de spa privatif. N'hésitez pas à nous demander une prestation sur mesure par l'intermédiaure du formulaire de contact.",
                "image_path" => "saint-jean.jpg",
                "user_id" => 6
            ]);
            Hotel::create([
                "name" => "Le Grand-Bé",
                "city" => "Saint-Malo",
                "address" => "9, route de Dinard, 35400",
                "description" => "Cet établissement haut de gamme, situé à l'intérieur les remparts,  saura vous accueilir pour un séjour luxueux. L'hôtel dispose d'une salle de sport, d'une piscine intérieure, et d'un complexe sauna / hamam / spa. Toutes les chambres ont vue sur le Grand-Bé et certaines de nos suites sont équipées de spa privatif. N'hésitez pas à nous demander une prestation sur mesure par l'intermédiaure du formulaire de contact.",
                "image_path" => "saint-malo.jpg",
                "user_id" => 7
            ]);
            Hotel::create([
                "name" => "Le Nuits-Saint-Georges",
                "city" => "Beaune",
                "address" => "14, route du cep, 21200",
                "description" => "Cet établissement luxueux, situé à proxipté des hospices de Beaune et à quelques encablures du domaine viticole 'Nuits-Saint-Georges',  saura vous accueilir pour un séjour haut de gamme. L'hôtel dispose d'une salle de sport, d'une piscine intérieure, et d'un complexe sauna / hamam / spa. La célèbre cave de létablissement peut se visiter et des séjours d'oenologie peuvent être organisés. Certaines de nos suites sont équipées de spa privatif. N'hésitez pas à nous demander une prestation sur mesure par l'intermédiaure du formulaire de contact.",
                "image_path" => "beaune.jpg",
                "user_id" => 8
            ]);
            Hotel::create([
                "name" => "La cité",
                "city" => "Carcassonne",
                "address" => "11, route de Barbaira, 11000",
                "description" => "Cet établissement luxueux, situé à l'intérieur des remparts de la cité médiévale,  saura vous accueilir pour un séjour préstigieux. L'hôtel dispose d'une salle de sport, d'une piscine extérieure et intérieure, et d'un complexe sauna / hamam / spa. Vous vous sentirez hors du temps.. Certaines de nos suites sont équipées de spa privatif. N'hésitez pas à nous demander une prestation sur mesure par l'intermédiaure du formulaire de contact.",
                "image_path" => "carcassonne.jpg",
                "user_id" => 9
            ]);
        }
    }
