<?php

namespace Database\Seeders;
use App\Models\Proveedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProveedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proveedores = [
            [
                'nombre' => 'Marec Bol',
                'email' => 'marecbol@gmail.com',
                'direccion' => '6to anillo Barrio El Fuerte santa cruz',
                'pais' => 'Bolivia',
                'telefono' => 77823456,
            ],
            [
                'nombre' => 'INCAPLASTICOS LTDA',
                'email' => 'incaplasticos@gmail.com',
                'direccion' => 'calle virreira No.881 Cochabamba',
                'pais' => 'Bolivia',
                'telefono' => 74896541,
            ],            
            // Agrega más registros aquí si deseas
        ];

        foreach ($proveedores as $proveedor) {
            Proveedor::create([
                'nombre' =>$proveedor['nombre'],
                'email'=>$proveedor['email'],
                'direccion' =>$proveedor['direccion'],
                'pais'=>$proveedor['pais'],
                'telefono' =>$proveedor['telefono'],
            ]);
        }
    }
}
