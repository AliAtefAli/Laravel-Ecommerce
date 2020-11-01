<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Coupon;
use Faker\Generator as Faker;

$factory->define(Coupon::class, function (Faker $faker) {
    return [
        'title' => $faker->title,
        'code' => $faker->uuid,
        'amount' => $faker->numberBetween(10, 50),
        'status' => 'unavailable',
        'product_id' => $faker->numberBetween(1, 10),
        'discount_type'  => 'percent',
    ];
});
