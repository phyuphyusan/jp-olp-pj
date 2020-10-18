<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'bachelor' => $faker->sentence($nbWords = 3),
        'position' => $faker->sentence($nbWords = 3),
    ];
});
