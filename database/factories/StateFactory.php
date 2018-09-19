<?php

use Faker\Generator as Faker;

$factory->define(App\Models\State::class, function (Faker $faker) {
    return [
      'country_id' => '1',
      'name' => $faker->unique()->state,
    ];
});
