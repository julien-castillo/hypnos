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
            "firstname" => "Manager",
            "lastname" => "1",
            "email" => "manager1@manager.fr",
            "password" => Hash::make("manager"),
            "role" => "manager"
        ]);
        User::create([
            "firstname" => "Manager",
            "lastname" => "2",
            "email" => "manager2@manager.fr",
            "password" => Hash::make("manager"),
            "role" => "manager"
        ]);
        User::create([
            "firstname" => "Manager",
            "lastname" => "3",
            "email" => "manager3@manager.fr",
            "password" => Hash::make("manager"),
            "role" => "manager"
        ]);
        User::create([
            "firstname" => "Manager",
            "lastname" => "4",
            "email" => "manager4@manager.fr",
            "password" => Hash::make("manager"),
            "role" => "manager"
        ]);
        User::create([
            "firstname" => "Manager",
            "lastname" => "5",
            "email" => "manager5@manager.fr",
            "password" => Hash::make("manager"),
            "role" => "manager"
        ]);
        User::create([
            "firstname" => "Manager",
            "lastname" => "6",
            "email" => "manager6@manager.fr",
            "password" => Hash::make("manager"),
            "role" => "manager"
        ]);
        User::create([
            "firstname" => "Manager",
            "lastname" => "7",
            "email" => "manager7@manager.fr",
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
