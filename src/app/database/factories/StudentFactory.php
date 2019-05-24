<?php

use App\Models\StudentModel;
use Faker\Generator as Faker;

$factory->define(StudentModel::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'group' => $faker->lexify('Group ??.??'),
        'age' => $faker->numberBetween(17, 25),
    ];
});
