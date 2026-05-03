<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Doctor;
use App\Models\User;
use App\Models\Consultorio;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();
        $consultorios = Consultorio::all();

        foreach ($users->take(50) as $index => $user) {
            Doctor::create([
                'user_id' => $user->id,
                'nombres' => 'Doctor '.$user->id,
                'apellidos' => 'Apellido '.$user->id,
                'telefono' => '300'.rand(1000000,9999999),
                'licencia_medica' => 'MED-'.rand(1000,9999),
                'especialidad' => 'General',
                'consultorio_id' => $consultorios->random()->id // 🔥 conexión real
            ]);
        }
    }
}