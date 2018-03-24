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

$factory->define(App\Institution::class, function (Faker $faker) {
    
    return [
        'name' => $faker->sentence(3, true), 
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->address,
      	'phone_number' => $faker->phoneNumber,
      	'owner_name' => $faker->name,
      	'description' => $faker->text(150),
      	'ratio' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 1),
      	'website' => $faker->domainName,
      	'lat' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 44.34, $max = 44.53),
      	'lng' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 25.97, $max = 26.22),
      	'status' => 1,
      	'type_id' => App\InstitutionType::all()->random()->id,
      	'short_description' => $faker->text(20),
    ];
});
