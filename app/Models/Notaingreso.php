<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notaingreso extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha',
        'costototal',
        'id_proveedor',

    ];

    //relacion uno a muchos proveedor-notaDeSalidas (inversa)
    public function proveedors()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    //relacion muchos a muchos notadesalida-repuestos
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'detalleingresos')->withPivot('id_producto', 'cantidad', 'costounitario', 'subtotal');
    }
}
