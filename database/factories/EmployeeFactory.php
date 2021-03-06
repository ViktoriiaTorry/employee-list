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

$factory->define(App\Employee::class, function (Faker $faker) {

    return [
        'ful_name' => $faker->name,
        'position' => $faker->jobTitle,
        'employment_date' => $faker->dateTimeBetween('-3 years', 'now'),
        'salary' => rand(20000, 200000),
        'manager_id' => rand(1, 7),
    ];
});
