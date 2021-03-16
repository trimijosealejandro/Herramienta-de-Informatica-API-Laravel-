<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    protected $table='mantenimientos';
    protected $fillable=[
        'name',
        'area',
        'equipo',
        'fecha',
        'tecnico',
        'labor_realizada',
        'observaciones',
    ];
    public function pc()
    {
        return $this->belongsTMany('App\Pc','pcs_id');
    }
}
