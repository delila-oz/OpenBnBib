<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Profile;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(Profile::class, function (Faker $faker) {
    return [
        'profile_title' => $faker->realText(80),
        'profile_description' => $faker->realText(180),
        'is_host' => $faker->boolean(),
        'length_of_stay' => $faker->randomDigitNotNull(),
        'plz' => $faker->postcode,
        'location' => $faker->city,
        'latitude' => $faker->regexify('([4][7-9]|[5][0-4])\.[0-9]{10}'),
        'longitude'  => $faker->regexify('([6-9]|[1][0-4])\.[0-9]{10}'),
        'offer_as_host' => $faker->realText(180),
        'accommodation_description' => $faker->realText(180),
        'accommodation_type' => '',
        'own_room'  => $faker->boolean(),
        'pets' => '',
        'accessibility' => '',
        'number_of_persons' => $faker->randomDigitNotNull(),
        'professional_offer' => '',
//        'is_smoker'  => $faker->boolean(),
        'professional_description' => $faker->realText(180),
    ];
});
