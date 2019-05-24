<?php

use App\Models\ClassModel;
use Faker\Generator as Faker;

$factory->define(ClassModel::class, function (Faker $faker) {
    return [
        'title' => $faker->jobTitle,
        'teacher_id' => rand(1, 3),
    ];
});
