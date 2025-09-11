<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;
use App\Models\Profesor;
use App\Models\Asignatura;
use Faker\Factory as Faker;

class ProyectoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ✅ Opción 1: usar Factory si existe
        if (class_exists(\Database\Factories\ProyectoFactory::class)) {
            Proyecto::factory()->count(10)->create();
            return;
        }

        // ✅ Opción 2: fallback con Faker
        $faker = Faker::create('es_ES');

        $profesores = Profesor::all();
        $asignaturas = Asignatura::all();

        for ($i = 0; $i < 10; $i++) {
            Proyecto::create([
                'titulo'       => $faker->sentence(3),
                'descripcion'  => $faker->paragraph(),
                'profesor_id'  => $profesores->isNotEmpty() ? $profesores->random()->id : null,
                'asignatura_id'=> $asignaturas->isNotEmpty() ? $asignaturas->random()->id : null,
                'fecha_inicio' => $faker->date(),
                'fecha_fin'    => $faker->dateTimeBetween('now', '+1 year'),
                'created_at'   => now(),
                'updated_at'   => now(),
            ]);
        }
    }
}
