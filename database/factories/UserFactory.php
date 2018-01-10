<?php

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

$factory->define(App\Entity\User::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, 99999). rand(1, 9999),
        'open_id' => md5($faker->unique()->sha256),
    ];
});
