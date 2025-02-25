<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profesor>
 */
class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName(),
            'apellido' => $this->faker->lastName(),
            'asignatura_id' => function() {
                return \App\Models\Asignatura::inRandomOrder()->first()->id;
            },
            'email' => $this->faker->unique()->safeEmail(),
            'telefono' => $this->faker->numerify('6########'), // Genera números que empiezan por 6 seguidos de 8 dígitos aleatorios
            'aula' => $this->faker->numberBetween(1, 20),   
        ];
    }
}

