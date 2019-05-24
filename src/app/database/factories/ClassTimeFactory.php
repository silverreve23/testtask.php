<?php

use App\Models\ClassTimeModel;
use Faker\Generator as Faker;

$factory->define(ClassTimeModel::class, function (Faker $faker) {
    return [
        'day' => $faker->dayOfWeek,
        'time' => $faker->time,
    ];
});
