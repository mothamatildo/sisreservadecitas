<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@admin.com',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Doctor1',
            'email' => 'doctor1@admin.com',
            'password' => Hash::make('12345678'),
        ]);
        
        User::create([
            'name' => 'Paciente',
            'email' => 'paciente@admin.com',
            'password' => Hash::make('12345678'),
        ]);
    }
}