<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function () {
    $faker = \Faker\Factory::create('de_DE');
    
    return [
        'forename' => $faker->firstName,
        'surname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'birthdate' => $faker->dateTimeThisCentury->format('Y-m-d'),
        'city' => $faker->city,
        'street' => $faker->streetAddress,
        'phone_number' => $faker->phoneNumber,
        'password' => Hash::make($faker->password)
    ];
});
