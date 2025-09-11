<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Asignatura;
use App\Models\Profesor;
use App\Models\Alumno;

class AsignaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profesores = Profesor::all();
        $alumnos = Alumno::all();

        if ($profesores->isEmpty() || $alumnos->isEmpty()) {
            $this->command->warn('⚠️ No hay profesores o alumnos disponibles, no se pueden asignar asignaturas.');
            return;
        }

        $asignaturas = [
            'Matemáticas',
            'Lengua',
            'Historia',
            'Geografía',
            'Física',
            'Química',
            'Biología',
            'Inglés',
            'Educación Física',
            'Arte',
            'Música',
            'Tecnología',
            'Informática',
            'Filosofía',
            'Economía',
            'Literatura',
            'Dibujo Técnico',
            'Francés',
            'Alemán',
            'Latín',
            'Griego',
            'Psicología',
            'Sociología',
            'Ética',
            'Religión'
        ];

        foreach ($asignaturas as $nombreAsignatura) {
            $asignatura = Asignatura::create([
                'nombre'       => $nombreAsignatura,
                'descripcion'  => "Asignatura de $nombreAsignatura",
                'profesor_id'  => $profesores->random()->id,
                'max_alumnos'  => 15,
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);

            // Asignar entre 5 y 15 alumnos aleatorios
            $numAlumnos = rand(5, min(15, $alumnos->count()));
            $alumnosAleatorios = $alumnos->random($numAlumnos);
            $asignatura->alumnos()->attach($alumnosAleatorios);
        }
    }
}
