<?php

/** @var Factory $factory */

use App\Image;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'path' => '',
        'url' => $faker->imageUrl()
    ];
});
