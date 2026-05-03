<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Secretaria;
use App\Models\User;

class SecretariaSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::all();

        foreach ($users->take(50) as $user) {
            Secretaria::create([
                'nombres' => 'Secretaria '.$user->id,
                'apellidos' => 'Apellido '.$user->id,
                'cc' => rand(10000000,99999999),
                'celular' => '300'.rand(1000000,9999999),
                'fecha_nacimiento' => now()->subYears(rand(20,40)),
                'direccion' => 'Dirección '.$user->id,
                'user_id' => $user->id
            ]);
        }
    }
}