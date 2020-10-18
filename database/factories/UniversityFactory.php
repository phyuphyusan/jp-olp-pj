<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\University;
use App\Lecturer;
use Faker\Generator as Faker;

$factory->define(University::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 3),
        'photo' => 'backendtemplate/universityimg/' . $faker->image('public/backendtemplate/universityimg',400,300, null, false),
        'location' => $faker->sentence($nbWords = 3),
    ];
});
$factory->define(Lecturer::class, function (Faker $faker) {
    return [
      'bachelor' => $faker->bachelor,
      'position' => $faker->position,
    ];
});
