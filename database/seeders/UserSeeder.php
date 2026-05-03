<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678')
        ]);

        // 50 usuarios
        for ($i = 1; $i <= 50; $i++) {
            User::create([
                'name' => 'Usuario '.$i,
                'email' => 'user'.$i.'@mail.com',
                'password' => Hash::make('12345678')
            ]);
        }
    }
}