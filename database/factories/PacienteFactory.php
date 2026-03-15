<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Paciente>
 */
class PacienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombres'=>$this->faker->name,
            'apellidos'=>$this->faker->lastName,
            'cc'=>$this->faker->unique()->numerify('########'),
            'nro_seguro'=>$this->faker->unique()->numerify('########'),
            'celular'=>$this->faker->phoneNumber,
            'fecha_nacimiento'=>$this->faker->date('y-m-d', '2020-01-01'),
            'genero'=>$this->faker->randomElement(['M','F']),
            'direccion'=>$this->faker->address,
            'correo'=>$this->faker->unique()->safeEmail,
            'grupo_sanguineo'=>$this->faker->randomElement(['A+','A-','B+','B-','O+','O-']),
            'alergias' => $this->faker->sentence,
            'contacto_emergencia'=>$this->faker->phoneNumber,
            'observaciones' => $this->faker->paragraph,


        ];
    }
}
