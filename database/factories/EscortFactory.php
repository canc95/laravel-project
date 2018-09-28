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
        'age' => rand(18, 35),
        'passport' => 'P'.$faker->numberBetween(100000000, 999999999),
        'birthday' => $faker->date,
        'gender' => $faker->randomElement(['Female', 'Male', 'Transexual', 'Other']),
        'country' => 'US',
        'nationality' => 'American',
        'etnia' => $faker->randomElement(['Caucasian', 'Black', 'Latin', 'Asian', 'Mixed_Race']),
        'height' => rand(135, 180),
        'eye_color' => $faker->randomElement(['Green', 'Blue', 'Black', 'Brown', 'Yellow']),
        'hair_color' => $faker->randomElement(['Blonde', 'Black', 'Brown', 'Redhead']),
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
