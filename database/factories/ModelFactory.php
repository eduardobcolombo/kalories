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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'calories' => $faker->numberBetween(1,10000),
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(Categorie::class, function (Faker\Generator $faker) {
    return [
        'date' => $faker->date,
        'time' => $faker->time,
        'text' => $faker->sentence,
        'number_of_calories' => $faker->numberBetween(1,10000),
    ];
});

