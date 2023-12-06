<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnidadMedida extends Model
{
    use HasFactory;
    protected $fillable=[
        'unidadbase'=>'required',
        'unidadtransaccion'=>'required',
        'multiplicador'=>'required',     
         
    ];

    //relacion uno a muchos unidadMedida-materiales
    public function materials(){
        return $this->hasMany(Material::class,'id_unidadmedida');
    }
}
