<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    protected $table='incidencias';
    protected $fillable=[
        'name',
        'fecha',
        'hecho_detectado',
        'forma_de_deteccion',
        'medidas_tomadas',
        'observacion',
    ];
    public function pc()
    {
        return $this->belongsToMany('App\Pc','pcs_id');
    }
}
