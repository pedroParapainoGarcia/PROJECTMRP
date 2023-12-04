<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdenTrabajo extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad_a_producir',
        'descripcion',
        'estado',
        'fecha_inicio_planificada',
        'fecha_final_planificada',
    ];

    //relacion uno a muchos OrdenTrabajo-producto (inversa)
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id');
    }
    
}
