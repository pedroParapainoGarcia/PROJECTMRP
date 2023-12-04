<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre' => 'required',
        'email' => 'required',
        'direccion' => 'required',
        'pais' => 'required',
        'telefono' => 'required',
    ];

    //relacion uno a muchos proveedor-notaingreso
    public function notaingresos()
    {
        return $this->hasMany(Notaingreso::class, 'id');
    }
}
