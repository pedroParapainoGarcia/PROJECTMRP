<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Detalleingreso extends Model
{
    use HasFactory;
    
    protected $table = 'detalleingresos';

    // Relación muchos a uno: Detalleingresos -> Material
    public function material()
    {
        return $this->belongsTo(Material::class, 'id_material');
    }

    // Relación muchos a uno: Detalleingresos -> Notaingreso
    public function notaingreso()
    {
        return $this->belongsTo(Notaingreso::class, 'id_notaingreso');
    }
}
