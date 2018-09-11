<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Plan::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph,
        'duration' => rand(90, 180),
        'price' => rand(250, 1000),
    ];
});
