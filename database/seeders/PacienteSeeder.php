<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    public function run(): void
    {
        $grupos = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-'];

        for ($i = 1; $i <= 50; $i++) {
            Paciente::create([
                'nombres' => 'Paciente '.$i,
                'apellidos' => 'Apellido '.$i,
                'cc' => rand(10000000,99999999),
                'nro_seguro' => 'SEG-'.$i, // mejor evitar duplicados
                'celular' => '300'.rand(1000000,9999999),
                'correo' => 'paciente'.$i.'@correo.com',
                'fecha_nacimiento' => now()->subYears(rand(1,80)),
                'genero' => 'M',
                'grupo_sanguineo' => $grupos[array_rand($grupos)],
                'alergias' => 'Ninguna', // 👈 NUEVO
                'contacto_emergencia' => '300'.rand(1000000,9999999), // 👈 NUEVO
                'direccion' => 'Dirección '.$i,
                'observaciones' => null
            ]);
        }
    }
}