<?php

use Faker\Generator as Faker;

$factory->define(App\MovimientoPc::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'departamento'=>$faker->word,
        'fecha'=>$faker->dateTime,
        'accesorio_movido'=>$faker->word,
        'lugar_origen'=>$faker->word,
        'lugar_destino'=>$faker->word,
        'responsable_entrega'=>$faker->name,
        'responsable_recibe'=>$faker->name,
    ];
});
