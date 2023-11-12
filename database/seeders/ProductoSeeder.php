<?php

namespace Database\Seeders;


use App\Models\Producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $repuestos = [
            [
                'nombre' => 'Polietileno de alta densidad',
                'descripcion' => 'polímero termoplástico',
                'id_categoria' => 1,
                'stock' => 0,
                
            ],
            [
                
                'nombre' => 'Polipropileno',
                'descripcion' => 'derivado del petróleo ',
                'id_categoria' => 1,
                'stock' => 0,
            ],
            [
                
                'nombre' => 'Botellas Reciclable',
                'descripcion' => 'de gaseosas',
                'id_categoria' => 5,
                'stock' => 0,
            ],
            [
                
                'nombre' => 'Aditivo de colorantes y pigmentos',
                'descripcion' => 'colores Primarios',
                'id_categoria' => 6,
                'stock' => 0,
            ],
            [
                
                'nombre' => 'Retardante de llamas',
                'descripcion' => 'Retardantes insustriales',
                'id_categoria' => 3,
                'stock' => 0,
            ],
           
        ];

        foreach ($repuestos as $repuesto) {
            Producto::create($repuesto);
        } 
 
    }
}
