<?php

namespace Database\Seeders;

use App\Models\Asignatura;
use App\Models\Profesor;
use App\Models\Alumno;
use Illuminate\Database\Seeder;

class AsignaturaSeeder extends Seeder
{
    public function run(): void
    {
        $profesores = Profesor::all();
        $alumnos = Alumno::all();

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
                'nombre' => $nombreAsignatura,
                'descripcion' => "Asignatura de $nombreAsignatura",
                'profesor_id' => $profesores->random()->id,
                'max_alumnos' => 15
            ]);

            // Asignar entre 5 y 15 alumnos aleatorios a cada asignatura
            $numAlumnos = rand(5, 15);
            $alumnosAleatorios = $alumnos->random($numAlumnos);
            $asignatura->alumnos()->attach($alumnosAleatorios);
        }
    }
}