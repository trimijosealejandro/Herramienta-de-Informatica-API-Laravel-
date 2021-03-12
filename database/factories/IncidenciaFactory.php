<?php

use Faker\Generator as Faker;

$factory->define(App\Incidencia::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
            'fecha'=>$faker->dateTime,
            'hecho_detectado'=>$faker->sentence,
            'forma_de_deteccion'=>$faker->sentence,
            'medidas_tomadas'=>$faker->sentence,
            'observacion'=>$faker->sentence,       
    ];
});
