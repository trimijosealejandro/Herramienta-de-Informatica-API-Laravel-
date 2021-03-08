<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    protected $table='software';
    protected $fillable=[
        'name',
        'area',
        'software_instalados',
        'instalado_por',
        'fecha',
        'observaciones',
    ];
    public function pc()
    {
        return $this->belongsToMany('App\Pc');
    }
}
