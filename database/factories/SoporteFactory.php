<?php

use Faker\Generator as Faker;

$factory->define(App\Soporte::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'area'=>$faker->word,
        'contenido'=>$faker->sentence,
        'trabajo'=>$faker->sentence,
        'nivel_de_acceso'=>$faker->word,
        'fecha_entrada'=>$faker->dateTime,
        'fecha_salida'=>$faker->dateTime,
        'observaciones'=>$faker->sentence,
    ];
});
