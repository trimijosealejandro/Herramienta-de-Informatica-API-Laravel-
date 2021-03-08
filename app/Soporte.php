<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soporte extends Model
{
    protected $table='soportes';
    protected $fillable=[
        'name',
        'area',
        'contenido',
        'trabajo',
        'nivel_de_acceso',
        'fecha_entrada',
        'fecha_salida',
        'observaciones',
    ];
    public function pc()
    {
        return $this->belongsToMany('App\Pc');
    }
}
