<?php

/** @var Factory $factory */

use App\Cart;
use App\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Cart::class, function (Faker $faker) {
    return [
        'cartable_id' => \factory(Product::class)->create()->id,
        'cartable_type' => Product::class,
        'size' => null
    ];
});
