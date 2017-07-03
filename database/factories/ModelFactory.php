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
    ];
});


$factory->define(App\Http\Models\City::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city,
    ];
});

$factory->define(App\Http\Models\ResidentialComplex::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company
    ];
});

$factory->define(App\Http\Models\Building::class, function (Faker\Generator $faker) {
    return [
        'name'    => 'Building 1',
        'address' => $faker->address,

        // near Kiev
        'lat'     => $faker->latitude(49, 51),
        'lon'     => $faker->longitude(29, 31),
    ];
});
