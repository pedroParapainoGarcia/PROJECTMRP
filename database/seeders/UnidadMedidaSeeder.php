<?php

namespace Database\Seeders;

use App\Models\UnidadMedida;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnidadMedidaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $unidadMedidas = [
            [
                'unidadbase' => 'ml',
                'unidadtransaccion' => 'Litro',
                'multiplicador' => 1000,        
            ],
            [
                'unidadbase' => 'cm',
                'unidadtransaccion' => 'Metro',
                'multiplicador' => 100,        
            ],
            [
                'unidadbase' => 'gr',
                'unidadtransaccion' => 'Kg',
                'multiplicador' => 1000,        
            ],
            [
                'unidadbase' => 'kg',
                'unidadtransaccion' => 'Tonelada',
                'multiplicador' =>1000,        
            ],
            [
                'unidadbase' => 'unidad',
                'unidadtransaccion' => 'kg',
                'multiplicador' =>100,        
            ],
            [
                'unidadbase' => 'cm',
                'unidadtransaccion' => 'pulgada',
                'multiplicador' =>254,        
            ],
                      
        ];

        foreach ($unidadMedidas as $unidadmedida) {
            UnidadMedida::create([
                'unidadbase' =>$unidadmedida['unidadbase'],
                'unidadtransaccion'=>$unidadmedida['unidadtransaccion'],
                'multiplicador' =>$unidadmedida['multiplicador'],                
                
            ]);
        } 
    }
}
