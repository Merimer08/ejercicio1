<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario de prueba
        User::updateOrCreate(
            ['email' => 'mariamalospelos@gmail.com'],
            [
                'name' => 'maria',
                'password' => '123456789', // cast 'hashed' lo cifra automáticamente
            ]
        );
    }
}