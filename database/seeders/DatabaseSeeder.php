<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // ⚡ Si estás en producción y no quieres llenar con datos de prueba,
        // puedes limitar qué seeders se ejecutan.
        if (app()->environment('production')) {
            // Aquí podrías cargar solo lo esencial
            $this->call([
                AlumnoSeeder::class,
                ProfesorSeeder::class,
            ]);

            return;
        }

        // En desarrollo (local), puedes usar Faker con libertad
        if (class_exists(\Faker\Factory::class)) {
            $faker = Faker::create('es_ES');

            // Ejemplo de uso directo de Faker
            // \DB::table('noticias')->insert([
            //     'titulo' => $faker->sentence(),
            //     'contenido' => $faker->paragraph(),
            //     'created_at' => now(),
            //     'updated_at' => now(),
            // ]);
        }

        // Llamamos a los seeders que ya tienes definidos
        $this->call([
            AlumnoSeeder::class,
            ProfesorSeeder::class,
            ProyectoSeeder::class,
            AsignaturaSeeder::class,
            NoticiaSeeder::class,
        ]);
    }
}
