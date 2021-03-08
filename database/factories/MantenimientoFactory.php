<?php

use Faker\Generator as Faker;

$factory->define(App\Mantenimiento::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'area'=>$faker->word,
        'equipo'=>$faker->word,
        'fecha'=>$faker->dateTime,
        'tecnico'=>$faker->name,
        'labor_realizada'=>$faker->sentence,
        'observaciones'=>$faker->sentence,
    ];
});
