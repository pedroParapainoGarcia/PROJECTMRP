<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'stock',
    ];

    //relacion uno a muchos producto-lote
    public function lotes()
    {
        return $this->hasMany(Lote::class, 'id');
    }

    //relacion uno a muchos producto-orden_trabajo
    public function orden_trabajos()
    {
        return $this->hasMany(OrdenTrabajo::class, 'id');
    }

    //relacion uno a muchos producto-orden_produccion
    public function orden_produccions()
    {
        return $this->hasMany(OrdenProduccion::class, 'id');
    }

    //relacion muchos a muchos producto-material
    public function materials()
    {
        return $this->belongsToMany(Material::class, 'requerimientos')->withPivot('cantidad_necesaria');
    }
}
