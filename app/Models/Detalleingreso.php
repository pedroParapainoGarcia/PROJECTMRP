<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleingreso extends Model
{
    use HasFactory;
    protected $table = 'detalleingresos';

    // Relación muchos a uno: Detalleingresos -> Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    // Relación muchos a uno: Detalleingresos -> Notaingreso
    public function notaingreso()
    {
        return $this->belongsTo(Notaingreso::class, 'id_notaingreso');
    }
}
