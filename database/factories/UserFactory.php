<?php

use Illuminate\Support\Str;
use Faker\Generator as Faker;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'lastName' => $faker->lastName,
        'date' => $faker->date('Y-m-d'),
        'route_img' => '',
        'email' => $faker->unique()->safeEmail,
        'ext' => $faker->randomNumber(4),
        'user' => $faker->unique()->userName,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'active' => '1',
        'role_id' => 2,
        'notes' => 'This user is the a admin user with position direction',
        'remember_token' => Str::random(10),
    ];
});
