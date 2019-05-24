<?php

use App\Models\TeacherModel;
use Faker\Generator as Faker;

$factory->define(TeacherModel::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'job_title' => $faker->company,
        'age' => $faker->numberBetween(17, 25),
    ];
});
