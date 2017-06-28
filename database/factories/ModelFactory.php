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
use SimpleSoftwareIO\QrCode\Facades\QrCode;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(\App\Entities\Ticket::class, function(Faker\Generator $faker){
   return array(
     'code' => base64_encode(QrCode::format('png')->size(300)->generate('Make me into an QrCode!')) ,
     'validity' => $faker->dateTime,
     'value' => rand(5, 100),
     'status' => rand(1, 3),
     'quantity' => rand(100, 1000),
   );
});
