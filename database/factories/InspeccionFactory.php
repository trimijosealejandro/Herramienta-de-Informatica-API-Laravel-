<?php

use Faker\Generator as Faker;

$factory->define(App\Inspeccion::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'fecha'=>$faker->dateTime,
        'area'=>$faker->word,
        'participantes'=>$faker->name,
        'situacion_detectada'=>$faker->sentence,
        'plan_medida'=>$faker->sentence,
        'responsable'=>$faker->name,
        'fecha_solucionar'=>$faker->dateTime, 
    ];
});
