<?php

use Faker\Generator as Faker;

$factory->define(App\UserRole::class, function (Faker $faker) {
    return [
        'role_name'		=>	$faker->unique()->name,
        'description'	=>	$faker->text(5),
    ];
});
