<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    private $userdata = [
        ["id" => 1, "name" => "hamad", "usertype" => "0", "email" => "elysium7x@gmail.com", "password" => "$2y$10$8kKRUltG9ihGZp9mwTjZ7uRL9m9E1k1IpqWqjP5BAnrX03KlMMRYO"],
        ["id" => 2, "name" => "Admin-hamad", "usertype" => "1", "email" => "client.elysium7x@gmail.com", "password" => "$2a$12\$nLi5SGdRhU0dKwFzD8joyuIOmLv2srI07AtXvpwrZJp/Cl0NzBax6"],
        ["id" => 3, "name" => "hamad4", "usertype" => "0", "email" => "elysium7xy@gmail.com", "password" => "$2y$10\$CD6.8SlR0jf1/PJoA08xgeAfIYCa8u2nMrj/eh9waSdiGU3nQM9VG"],
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::whereNotNull('id')->delete();
        foreach ($this->userdata as $data) {
            User::create([
                'id' => $data["id"],
                'name' => $data["name"],
                'usertype' => $data["usertype"],
                'email' => $data["email"],
                'password' => $data["password"],
            ]);
        }
    }
}
