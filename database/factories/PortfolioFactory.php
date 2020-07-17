<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Portfolio;
use Faker\Generator as Faker;

$factory->define(Portfolio::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'description' => $faker->text,
        'user_id' => rand(0, 10)
    ];
});
