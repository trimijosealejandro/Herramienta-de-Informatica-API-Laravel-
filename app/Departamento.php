<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table='departamentos';

    protected $fillable=[
        'name',
    ];

    public function pc()
    {
        return $this->hasMany('App\Pc','departamentos_id');
    }
}
