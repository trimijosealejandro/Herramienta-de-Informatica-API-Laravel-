<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seguridad extends Model
{
    protected $table='seguridads';
    protected $fillable=[
        'name',
        'seguridad_local',
        'cuidado_medios',
        'sello_seguridad',
        'expediente_tecnico',
        'registro_acceso',
        'acta_responsabilidad',
        'inventario',
        'password1',
        'password2',
        'password3',
        'permiso_administrador',
        'software_autorizado',
        'software_no_autorizado',
        'archivo_no_autorizado',
        'evaluacion_inspeccion',
        'observaciones',
];
public function pc(){
    return $this->belongsToMany('App\Pc','pcs_id');
}
}
