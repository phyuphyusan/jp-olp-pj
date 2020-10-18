<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Major;
use App\Subject;
use Faker\Generator as Faker;

$factory->define(Major::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence($nbWords = 3),
    ];
});

$factory->define(Subject::class, function (Faker $faker) {
    return [
      'name' => $faker->sentence($nbWords = 3),
    ];
});