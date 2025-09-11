<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Alumno;
use Faker\Factory as Faker;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usar Factory si ya la tienes definida en database/factories/AlumnoFactory.php
        if (class_exists(\Database\Factories\AlumnoFactory::class)) {
            Alumno::factory()->count(50)->create();
            return;
        }

        // Si no existe la Factory, usamos Faker directamente
        $faker = Faker::create('es_ES');

        for ($i = 0; $i < 50; $i++) {
            Alumno::create([
                'nombre' => $faker->firstName,
                'apellido' => $faker->lastName,
                'email' => $faker->unique()->safeEmail,
                'telefono' => $faker->phoneNumber,
                'edad' => $faker->numberBetween(18, 30),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
