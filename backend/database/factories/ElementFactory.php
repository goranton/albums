<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\Element::class, function (Faker $faker) {
    return [
        'photo' => $faker->imageUrl(200, 500),
        'secret' => $faker->uuid,
        'fio' => $faker->name,
    ];
});
