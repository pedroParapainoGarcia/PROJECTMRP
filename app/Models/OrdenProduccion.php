<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenProduccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad_a_producir',
        'estado',
        'fecha_inicio_planificada',
        'fecha_final_planificada',
    ];

    //relacion uno a muchos OrdenProduccion-producto (inversa)
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id');
    }

    //relacion uno a muchos OrdenProduccion-SeguimientoProduccion
    public function seguimiento_produccions()
    {
        return $this->hasMany(SeguimientoProduccion::class, 'id');
    }
}
