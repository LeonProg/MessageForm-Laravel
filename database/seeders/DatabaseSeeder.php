<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Message;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'id' => 1,
            'title' => 'User'
        ]);

        Role::create([
            'id' => 2,
            'title' => 'Manager'
        ]);

        User::create([
            'email' => 'manager@email.ru',
            'name' => 'Oleg',
            'role_id' => 2,
            'password' => Hash::make(12345678),
        ]);

        Message::factory(500)->create();


    }
}
