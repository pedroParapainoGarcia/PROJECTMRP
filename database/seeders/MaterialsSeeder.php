<?php

namespace Database\Seeders;

use App\Models\Material;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaterialsSeeder extends Seeder
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
                'id_unidadmedida' => 6,
                'id_categoria' => 1,
                'stock' => 0,
            ],
            [
                'nombre' => 'Polipropileno',
                'descripcion' => 'derivado del petróleo ',
                'id_unidadmedida' => 3,
                'id_categoria' => 1,
                'stock' => 0,
            ],
            [
                'nombre' => 'Clavos',
                'descripcion' => 'Grandes',
                'id_unidadmedida' => 5,
                'id_categoria' => 5,
                'stock' => 0,

            ],
            [
                'nombre' => 'Aditivo de colorantes y pigmentos',
                'descripcion' => 'colores Primarios',
                'id_unidadmedida' => 1,
                'id_categoria' => 6,
                'stock' => 0,

            ],
            [
                'nombre' => 'Retardante de llamas',
                'descripcion' => 'Retardantes insustriales',
                'id_unidadmedida' => 3,
                'id_categoria' => 3,
                'stock' => 0,

            ],

        ];

        foreach ($materiales as $material) {
            Material::create([
                'nombre' =>$material['nombre'],
                'descripcion'=>$material['descripcion'],
                'id_unidadmedida' =>$material['id_unidadmedida'],
                'id_categoria'=>$material['id_categoria'],
                'stock' =>$material['stock'],
                
            ]);
        } 
    }
}
