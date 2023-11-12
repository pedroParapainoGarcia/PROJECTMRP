<?php

namespace Database\Seeders;
use App\Models\Categoria;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorias = [
            'Termoplásticos', 'Termoestables', 'Retardantes','Resinas','Reciclable','Colorantes Artificiales'
        ];

        foreach ($categorias as $categoria) {
            Categoria::create([
                'nombres' => $categoria,
            ]);
        }
    }
}
