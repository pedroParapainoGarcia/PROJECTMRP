<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $materiales = [
            [
                'nombre' => 'Polietileno de alta densidad',
                'descripcion' => 'polímero termoplástico',
                'unidad_de_medida' => '900 mililitros',
                'stock' => 0,
                'id_categoria' => 1,
                
                
            ],
            [
                
                'nombre' => 'Polipropileno',
                'descripcion' => 'derivado del petróleo ',
                'unidad_de_medida' => '900 gramos',
                'stock' => 0,
                'id_categoria' => 1,
            ],
            [
                
                'nombre' => 'Clavos',
                'descripcion' => 'Grandes',
                'unidad_de_medida' => '2 pulgadas',
                'stock' => 0,
                'id_categoria' => 5,
            ],
            [
                
                'nombre' => 'Aditivo de colorantes y pigmentos',
                'descripcion' => 'colores Primarios',
                'unidad_de_medida' => '100 litros',
                'stock' => 0,
                'id_categoria' => 6,
            ],
            [
                
                'nombre' => 'Retardante de llamas',
                'descripcion' => 'Retardantes insustriales',
                'unidad_de_medida' => '50 kilogramos',
                'stock' => 0,
                'id_categoria' => 3,
            ],
           
        ];

        foreach ($materiales as $material) {
            Material::create($material);
        } 
    }
}
