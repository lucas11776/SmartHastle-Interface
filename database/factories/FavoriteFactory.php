<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Favorite;
use App\Product;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker) {
    return [
        'favoriteable_id' => ($product = factory(Product::class)->create())->id,
        'favoriteable_type' => get_class($product)
    ];
});
