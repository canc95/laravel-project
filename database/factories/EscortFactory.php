<?php

use App\Models\Plan;
use App\Models\State;
use Faker\Generator as Faker;

$factory->define(App\Models\Escort::class, function (Faker $faker) {

    $plan   = count(Plan::get());
    $state  = count(State::get());
    return [
        'plan_id'=> rand(1, $plan),
        'state_id'=> rand(1, $state),
        'first_name' => $faker->firstNameFemale,
        'last_name' => $faker->lastName,
        'passport' => 'P'.$faker->numberBetween(100000000, 999999999),
        'birthday' => $faker->date,
        'gender' => 'female',
        'country' => 'US',
        'nationality' => 'American',
        'height' => rand(135, 180),
        'eye_color' => $faker->colorName,
        'hair_color' => $faker->colorName,
        'weight' => rand(40, 65),
        'breast' => '95',
        'waist' => '60',
        'hip' => '95',
        'service' => 'Sex, Escort, Heterosexual',
        'phone' => $faker->phoneNumber,
        'description' => $faker->paragraph,
        'status' => 1,
        'photo_1' => 'photo-Lemke-18-American-Heidi1.jpg',
    ];
});
