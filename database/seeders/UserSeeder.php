<?php

namespace Database\Seeders;

use App\Models\Enums\UserRole;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(10)->create();
        User::factory()->count(1)->create([
                "user_role" => UserRole::ADMIN->value,
                "email" => "yahoo2ya@gmail.com",
                "username" => "admin",
                "name" => "Sadegh",
            ]);
    }
}
