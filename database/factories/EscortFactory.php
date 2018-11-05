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
        'gender' => $faker->randomElement(['Femmina', 'Maschio', 'Transessuale', 'Altro']),
        'country' => 'US',
        'nationality' => 'American',
        'etnia' => $faker->randomElement(['Caucasico', 'Nero', 'Asiatico', 'Latino', 'Indù', 'Arabo', 'Mixed_Race']),
        'height' => rand(135, 180),
        'eye_color' => $faker->randomElement(['Green', 'Blue', 'Black', 'Brown', 'Yellow']),
        'hair_color' => $faker->randomElement(['Nero', 'Bionda', 'Marrone', 'Testa Rossa', 'Altro']),
        'weight' => rand(40, 65),
        'breast' => '95',
        'waist' => '60',
        'hip' => '95',
        'service' => 'Sex, Escort, Heterosexual',
        'phone' => $faker->phoneNumber,
        'description' => $faker->paragraph,
        'status' => 1,
        'priority' => 1,
        'photo_1' => 'photo-Lemke-18-American-Heidi1.jpg',
        'photo_2' => 'photo-Lemke-18-American-Heidi1.jpg',
        'photo_3' => 'photo-Lemke-18-American-Heidi1.jpg',
        'photo_4' => 'photo-Lemke-18-American-Heidi1.jpg',
        'photo_5' => 'photo-Lemke-18-American-Heidi1.jpg'
    ];
});
