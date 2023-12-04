<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeguimientoProduccion extends Model
{
    use HasFactory;

    protected $fillable = [
        'cantidad_producida',
        'estado_de_envio',
        'fecha_de_envio',
    ];

    //relacion uno a muchos seguimientoProduccion-orden_produccion (inversa)
    public function orden_produccions()
    {
        return $this->hasMany(OrdenProduccion::class, 'id');
    }

}
