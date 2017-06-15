<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'username' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->word
    ];
});

$factory->define(App\Subcategory::class, function (Faker\Generator $faker) {

    return [
        'category_id' => rand(1, 5),
        'name' => $faker->unique()->word
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {

    return [
        'subcategory_id' => rand(1, 7),
        'name' => $faker->unique()->word,
        'description' => $faker->text(800),
        'price' => $faker->randomFloat(2, 340, 8000),
        'quantity' => rand(0, 15)
    ];
});

$factory->define(App\Review::class, function (Faker\Generator $faker) {

    return [
        'product_id' => 1,
        'user_id' => rand(1, 10),
        'review' => $faker->text(500),
    ];
});

$factory->define(App\Delivery::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->word,
        'price' => $faker->randomFloat(2, 5, 20)
    ];
});


$factory->define(App\Payment::class, function (Faker\Generator $faker) {

    return [
        'name' => $faker->unique()->word
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {

    return [
    ];
});
