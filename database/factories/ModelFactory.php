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
        'nombre' => $faker->name,
        'apellido' => $faker->word,
        'cedula' => $faker->word,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'direccion' => $faker->address,
        'telefono' => $faker->phoneNumber,
        'estatus' => $faker->boolean,
        'rol_id' => $faker->randomDigitNotNull,
        'remember_token' => str_random(10),
        'created_at' => date('Y-m-d h:i:s'),
        'updated_at' => date('Y-m-d h:i:s')
    ];
});
