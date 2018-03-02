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

$factory->define(App\User::class, function(Faker $faker) {
    static $password;
    
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
        'password' => $password ?: $password = bcrypt('secret'), // secret
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function(Faker $faker) {
    
    return [
        'categoryName' => $faker->word,
        'categoryDescription' => $faker->text,
        'publicationStatus' => $faker->boolean,
    ];
});

$factory->define(App\Manufacturer::class, function(Faker $faker) {
    
    return [
        'manufacturerName' => $faker->word,
        'manufacturerDescription' => $faker->text,
        'publicationStatus' => $faker->boolean,
    ];
});
