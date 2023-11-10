<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lote extends Model
{
    use HasFactory;
    protected $fillable = [
        'codigo',
        'cantidad',
        'id_producto',
    ];
    
    //relacion uno a muchos producto-lote
    public function productos(){
        return $this->hasMany(Producto::class,'id');
    }
}
