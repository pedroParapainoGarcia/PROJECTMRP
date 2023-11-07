<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $fillable=[
        'nombre'=>'required',     
        'email'=>'required',
        'direccion'=>'required',
        'pais'=>'required',
        'telefono'=>'required',
    ];

    use HasFactory;
}
