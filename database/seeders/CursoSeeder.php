<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Curso;
use App\Models\Categoria;

class CursoSeeder extends Seeder
{
    public function run(): void
    {
        $cursos = [
            ['title' => 'Laravel Básico', 'categoria' => 'Programación'],
            ['title' => 'Álgebra Lineal', 'categoria' => 'Matemáticas'],
            ['title' => 'Mecánica Clásica', 'categoria' => 'Física'],
            ['title' => 'Inglés A1', 'categoria' => 'Idiomas'],
            ['title' => 'Pintura al óleo', 'categoria' => 'Arte'],
        ];

        foreach ($cursos as $data) {
            $categoria = Categoria::where('name', $data['categoria'])->first();

            if ($categoria) {
                Curso::create([
                    'title' => $data['title'],
                    'category_id' => $categoria->id,
                    'created_by' => 1, // Cambia este valor si es necesario
                ]);
            }
        }
    }
}
