<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'unidad_de_medida',
        'stock',
        'id_categoria',
    ];

    //relacion uno a muchos categoria-material (inversa)
    public function categorias()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    //relacion muchos a muchos material-producto
    public function productos()
    {
        return $this->belongsToMany(Producto::class, 'requerimientos')->withPivot('cantidad_necesaria');
    }

    //relacion muchos a muchos material-notadeingreso
    public function notaingresos()
    {
        return $this->belongsToMany(Notaingreso::class, 'detalleingresos')->withPivot('cantidad', 'costounitario');
    }

}
