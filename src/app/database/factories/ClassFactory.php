<?php

use App\Models\ClassModel;
use Faker\Generator as Faker;

$factory->define(ClassModel::class, function (Faker $faker) {
    return [
        'title' => $faker->buildingNumber,
        'day' => $faker->dayOfMonth,
        'time' => $faker->time,
        'teacher_id' => rand(1, 3),
    ];
});
