<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notaingreso extends Model
{
    use HasFactory;
    protected $fillable = [
        'fecha_compra',        
        'costo_total',
        'id_proveedor',

    ];

    //relacion uno a muchos notaingreso-proveedor (inversa)
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    //relacion muchos a muchos notadeingreso-material
    public function material()
    {
        return $this->belongsToMany(Material::class, 'detalleingresos')->withPivot('cantidad', 'costounitario', 'subtotal');
    }

}
