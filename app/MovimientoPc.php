<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovimientoPc extends Model
{
    protected $table='movimiento_pcs';
    protected $fillable=[
        'name',
        'departamento',
        'fecha',
        'accesorio_movido',
        'lugar_origen',
        'lugar_destino',
        'responsable_entrega',
        'responsable_recibe',
    ];
    public function pc()
    {
        return $this->belongsToMany('App\Pc','pcs_id');
    }
}
