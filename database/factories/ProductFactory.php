<?php

use Faker\Generator as Faker;
use App\Models\User;

$factory->define (App \Models \Product::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random(),
        'name' => $faker->word,
        'detail' => $faker->paragraph,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 100, $max = 1000), // 48.8932
        'stock' => $faker->randomDigitNotNull,
        'discount' => $faker->numberBetween(2, 30),
    ];
});
