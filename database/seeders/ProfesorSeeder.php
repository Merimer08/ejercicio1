<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profesor;
use Faker\Factory as Faker;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Si tienes definida la Factory de Profesor, úsala
        if (class_exists(\Database\Factories\ProfesorFactory::class)) {
            Profesor::factory()->count(10)->create();
            return;
        }

        // Si no existe la Factory, usa Faker directamente
        $faker = Faker::create('es_ES');

        for ($i = 0; $i < 10; $i++) {
            Profesor::create([
                'nombre'      => $faker->firstName,
                'apellido'    => $faker->lastName,
                'email'       => $faker->unique()->safeEmail,
                'telefono'    => $faker->phoneNumber,
                'departamento'=> $faker->randomElement(['Matemáticas', 'Lengua', 'Ciencias', 'Idiomas', 'Arte']),
                'created_at'  => now(),
                'updated_at'  => now(),
            ]);
        }
    }
}
