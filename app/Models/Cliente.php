<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
    ];

    //relacion uno a muchos usuario-cliente
    public function cliente()
    {
        return $this->hasMany(Cliente::class, 'id');
    }

    //relacion uno a muchos usuario-orden_produccion
    public function orden_produccion()
    {
        return $this->hasMany(OrdenProduccion::class, 'id');
    }
}
