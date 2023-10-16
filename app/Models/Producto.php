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

    ];
    //relacion uno a muchos categorias-productos (inversa)
    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }
}
