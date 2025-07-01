<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        /* User::factory(0)->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]); */

        User::factory()->create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password123'), // pon la contraseña que quieras
            'role' => 'admin',
        ]);


        $this->call([
            CategoriaSeeder::class,
            CursoSeeder::class,
        ]);
    }
}
