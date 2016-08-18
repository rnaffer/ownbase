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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'second' => $faker->word,
        'document' => $faker->randomNumber(7),
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'address' => $faker->address,
        'phone' => $faker->phoneNumber,
        'status' => $faker->boolean,
        'role_id' => $faker->numberBetween(1, 10),
        'remember_token' => str_random(10),
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->jobTitle,
        'status' => $faker->boolean,
    ];
});

$factory->define(App\Module::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'father_id' => 1,
    ];
});

$factory->define(App\Permission::class, function (Faker\Generator $faker) {
    return [
        'role_id' => $faker->numberBetween(1, 10),
        'module_id' => $faker->numberBetween(1, 4),
        'addon' => $faker->boolean,
        'edit' => $faker->boolean,
        'see' => $faker->boolean,
        'disable' => $faker->boolean
    ];
});
