<?php

// database/seeders/CategoriaSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categoria;

class CategoriaSeeder extends Seeder
{
    public function run(): void
    {
        $categories = [
            'Programación',
            'Matemáticas',
            'Física',
            'Idiomas',
            'Arte'
        ];

        foreach ($categories as $nombre) {
            Categoria::create(['name' => $nombre]);
        }
    }
}
