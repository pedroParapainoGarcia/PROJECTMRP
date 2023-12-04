<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo_de_lote',
        'cantidad_producida',
        'id_producto',
    ];
    
    //relacion uno a muchos lote-producto (inversa)
    public function productos(){
        return $this->hasMany(Producto::class,'id');
    }
}
