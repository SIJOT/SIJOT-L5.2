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

// TODO: Make Role factory.
// TODO: Make Group factory.
// TODO: Make Rental factory

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'gsm' => $faker->phoneNumber,
        'images' => $faker->word,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Group::class, function (Faker\Generator $faker) {
    return [
        'Uri' => $faker->word,
        'title' => $faker->title,
        'sub_title' => $faker->title,
        'description' => $faker->text(300),
    ];
});
