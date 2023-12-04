<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requerimiento extends Model
{
    use HasFactory;

    protected $table = 'requerimiento';

    // Relación muchos a uno: Requerimiento -> Material
    public function material()
    {
        return $this->belongsTo(Material::class, 'id_material');
    }

    // Relación muchos a uno: Requerimiento -> Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
