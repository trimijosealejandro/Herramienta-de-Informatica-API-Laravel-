<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    protected $table='inspeccions';
    protected $fillable=[
        'name',
        'fecha',
        'area',
        'participantes',
        'situacion_detectada',
        'plan_medida',
        'responsable',
        'fecha_solucionar',
    ];
    public function pc()
    {
        return $this->belongsToMany('App\Pc','pcs_id');
    }
}
