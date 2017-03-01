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
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
        'points' => 0,
        'voting_power' => 1,
    ];
});

$factory->define(App\Version::class, function (Faker\Generator $faker) {
    return [
        'version' => $faker->name,
        'release_date' => $faker->date(),
        'confirmed_real' => 0,
        'confirmed_release_date' => null,
        'software_id' =>factory(App\User::class)->create()->id,
        'user_id' => factory(App\Software::class)->create()->id,
    ];
});

$factory->define(App\Software::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'user_id' => factory(App\Software::class)->create()->id,
    ];
});