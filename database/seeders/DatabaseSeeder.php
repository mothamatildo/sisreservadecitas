<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ConsultorioSeeder::class,
            SecretariaSeeder::class,
            PacienteSeeder::class,
            DoctorSeeder::class,
        ]);
    }
}