<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function(Faker $faker) {
    return [
        'ar' => ['name' =>  $faker->name, 'description' => $faker->paragraph],
        'en' => ['name' =>  $faker->name, 'description' => $faker->paragraph],
        'price' => $faker->numberBetween(1000, 10000),
        'category_id' => $faker->randomElement([1, 2, 3, 4, 5, 6, 7]),
        'quantity' => 100
    ];
} );
