<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Country::class, function (Faker $faker) {
    return [
      'continent_name' => 'North American',
      'country_name' => 'United States',
    ];
});
