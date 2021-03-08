<?php

use Faker\Generator as Faker;

$factory->define(App\Software::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'area'=>$faker->word,
        'software_instalados'=>$faker->sentence,
        'instalado_por'=>$faker->name,
        'fecha'=>$faker->dateTime,
        'observaciones'=>$faker->sentence,
    ];
});
