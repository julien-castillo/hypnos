<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        User::create([
            "firstname" => "Julien",
            "lastname" => "Castillo",
            "email" => "juliencastillo77@gmail.com",
            "password" => Hash::make("test"),
            "role" => "admin"
        ]);
        User::create([
            "firstname" => "Admin ",
            "lastname" => "Admin",
            "email" => "admin@admin.fr",
            "password" => Hash::make("admin"),
            "role" => "admin"
        ]);
        User::create([
            "firstname" => "Carine",
            "lastname" => "Pic",
            "email" => "carine.pic@niji.fr",
            "password" => Hash::make("test"),
            "role" => "manager"
        ]);
        User::create([
            "firstname" => "Manager",
            "lastname" => "1",
            "email" => "manager@manager.fr",
            "password" => Hash::make("manager"),
            "role" => "manager"
        ]);
        User::create([
            "firstname" => "User",
            "lastname" => "1",
            "email" => "user1@user.fr",
            "password" => Hash::make("user"),
            "role" => "user"
        ]);
        User::create([
            "firstname" => "User",
            "lastname" => "2",
            "email" => "user2@user.fr",
            "password" => Hash::make("user"),
            "role" => "user"
        ]);
    }
}
