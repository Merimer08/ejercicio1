<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Profesor;
use App\Models\Asignatura;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->word(),
            'descripcion' => $this->faker->sentence(),
            "horas" => $this->faker->randomNumber(2),
            "complejidad" => collect(["Alta","Media","Baja"])->random(),/* esto es cojer array a coleccion en JS */
            'profesor_id' => Profesor::factory(),   
            
        ];
    }
}
