<?php

use Faker\Generator as Faker;

$factory->define(App\Seguridad::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'seguridad_local'=>'bien',
        'cuidado_medios'=>'bien',
        'sello_seguridad'=>'bien',
        'expediente_tecnico'=>'bien',
        'registro_acceso'=>'bien',
        'acta_responsabilidad'=>'bien',
        'inventario'=>'bien',
        'password1'=>'bien',
        'password2'=>'bien',
        'password3'=>'bien',
        'permiso_administrador'=>'bien',
        'software_autorizado'=>'bien',
        'software_no_autorizado'=>'bien',
        'archivo_no_autorizado'=>'bien',
        'evaluacion_inspeccion'=>'bien',
        'observaciones'=>'bien',
    ];
});
