<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Contact;
use Faker\Generator as Faker;

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email'=> $faker->email,
        'city' => $faker->city,
        'country' => $faker->country,
        'job_title' => $faker->jobTitle
    ];
});
