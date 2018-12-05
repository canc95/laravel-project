<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Country::class, function (Faker $faker) {
    return [
      'continent_name' => 'Europe',
      'country_name' => 'Italy',
    ];
});
