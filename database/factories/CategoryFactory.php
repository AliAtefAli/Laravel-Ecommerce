<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Category;
use Faker\Generator as Faker;


$factory->define(Category::class, function(Faker $faker) {
    return [
        'ar' => ['name' =>  $faker->name, 'description' => $faker->paragraph],
        'en' => ['name' =>  $faker->name, 'description' => $faker->paragraph],
        'image' => $faker->image()
    ];
} );
