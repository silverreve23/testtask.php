<?php

use App\Models\StudentModel;
use Faker\Generator as Faker;

$factory->define(StudentModel::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'age' => $faker->numberBetween(17, 25),
    ];
});
