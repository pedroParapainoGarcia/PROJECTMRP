<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombres' => 'required',
    ];

    //relacion uno a muchos categoria-material
    public function materials()
    {
        return $this->hasMany(Material::class, 'id_categoria');
    }
}
