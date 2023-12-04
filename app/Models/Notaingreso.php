<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notaingreso extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_compra',
        'descripcion',
        'costo_total',
        'id_proveedor',

    ];

    //relacion uno a muchos notaingreso-proveedor (inversa)
    public function proveedors()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    //relacion muchos a muchos notadeingreso-material
    public function materials()
    {
        return $this->belongsToMany(Material::class, 'detalleingresos')->withPivot('cantidad', 'costounitario');
    }

}
