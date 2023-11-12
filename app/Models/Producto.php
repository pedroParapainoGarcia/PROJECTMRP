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
        'id_categoria',
        'stock',
        

    ];
    //relacion uno a muchos categorias-productos (inversa)
    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

     //relacion muchos a muchos repuestos-notaingresos
     public function notaingresos(){
        return $this->belongsToMany(Notaingreso::class,'detalleingresos')->withPivot('cantidad','costounitario','subtotal');
    }

    public function lotes(){
        return $this->hasMany(Lote::class,'id');
    }
}
