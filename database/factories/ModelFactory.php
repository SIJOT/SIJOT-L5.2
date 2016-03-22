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

$factory->define(App\Rental::class, function (Faker\Generator $faker) {
    return [
        'Start_date' => $faker->date('d-m-Y'),
        'End_date' => $faker->date('d-m-Y'),
        'Status' => $faker->numberBetween(0, 2),
        'Email' => $faker->email,
        'Group' => $faker->word,
        'telephone' => $faker->word,
    ];
});

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
