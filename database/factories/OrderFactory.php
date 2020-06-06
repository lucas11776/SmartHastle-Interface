<?php

/** @var Factory $factory */

use App\Order;
use App\Product;
use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => \factory(User::class)->create()->id,
        'status' => Order::STATUS[rand(0, count(Order::STATUS) - 1)],
    ];
});
