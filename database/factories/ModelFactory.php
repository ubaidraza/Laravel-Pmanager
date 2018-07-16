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
        'first_name' => $faker->word,
        'middle_name' => $faker->word,
        'last_name' => $faker->word,
        'city' => $faker->word,
        'role_id' => App\Role::all()->random()->id,
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Role::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name
    ];
});

$factory->define(App\Company::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(random_int(2,4)),
        'user_id' => App\User::all()->random()->id
    ];
});

$factory->define(App\Project::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'description' => $faker->paragraph(random_int(2,4)),
        'days' => random_int(10,30),
        'user_id' => App\User::all()->random()->id,
        'company_id' => App\Company::all()->random()->id
    ];
});
