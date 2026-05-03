<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Consultorio;

class ConsultorioSeeder extends Seeder
{
public function run(): void
{
    for ($i = 1; $i <= 50; $i++) {
        Consultorio::create([
            'nombre' => 'Consultorio '.$i,
            'ubicacion' => 'Piso '.rand(1, 5),
            'capacidad' => rand(1, 5),
            'especialidad' => 'General',
            'estado' => 'ACTIVO'
        ]);
    }
}
}