<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Asignatura;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asignatura>
 */
class AsignaturaFactory extends Factory
{
    protected $model = Asignatura::class;

    public function definition(): array
    {
        return [
            'nombre' => $this->faker->randomElement([
                'Matemáticas', 'Física', 'Química', 'Biología', 'Historia',
                'Geografía', 'Lengua', 'Literatura', 'Inglés', 'Francés',
                'Informática', 'Programación', 'Bases de Datos', 'Redes',
                'Sistemas Operativos', 'Desarrollo Web', 'Inteligencia Artificial',
                'Robótica', 'Electrónica', 'Diseño Gráfico'
            ]),
            'descripcion' => $this->faker->paragraph()
        ];
    }
}
