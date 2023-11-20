<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\Answers::class, function (Faker $faker) {
    return [
        'fullname' => $faker->name,
        'gender' => $faker->randomElement(['1', '2']),
        'age_id' => $faker->numberBetween(1, 6), // 임의의 숫자로 수정
        'email' => $faker->email,
        'is_send_email' => $faker->boolean,
        'feedback' => $faker->paragraph,
    ];
});