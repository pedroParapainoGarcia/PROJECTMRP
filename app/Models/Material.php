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
        'id_unidadmedida',
        'id_categoria',
        'stock',
    ];

    //relacion uno a muchos categoria-material (inversa)
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    //relacion uno a muchos unidad_medidas-material (inversa)
    public function unidad_medida()
    {
        return $this->belongsTo(UnidadMedida::class, 'id_unidadmedida');
    }

     //relacion muchos a muchos materiales-notaingresos
     public function notaingreso(){
        return $this->belongsToMany(Notaingreso::class,'detalleingresos')->withPivot('cantidad','costounitario','subtotal');
    }
    

    //relacion muchos a muchos material -productos
    public function producto()
    {
        return $this->belongsToMany(Producto::class, 'requerimientos')->withPivot('cantidad_necesaria','costounitario','subtotal');
    }

}
