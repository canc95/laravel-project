<?php

use App\Models\Plan;
use Faker\Generator as Faker;

$factory->define(App\Models\Escort::class, function (Faker $faker) {

    $plan   = count(Plan::get());
    return [
        'plan_id'=> rand(1, $plan),
        'first_name' => $faker->firstNameFemale,
        'last_name' => $faker->lastName,
        'age' => rand(18, 40),
        'birthday' => $faker->date,
        'gender' => 'female',
        'country' => 'US',
        'state' => $faker->state,
        'nationality' => 'American',
        'height' => rand(1.35 , 1.80),
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
        'photo_1' => 'photo-Sawayn-29-American-Ashley1.jpg',
        'photo_2' => 'photo-Sawayn-29-American-Ashley2.jpg',
        'photo_3' => 'photo-Sawayn-29-American-Ashley3.jpg',
        'photo_4' => 'photo-Sawayn-29-American-Ashley4.jpg',
        'photo_5' => 'photo-Sawayn-29-American-Ashley5.jpg',
    ];
});
