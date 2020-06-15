<?php

/** @var Factory $factory */

use App\User;
use App\Order;
use App\Product;
use App\OrderItem;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factory;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)->create()->id,
        'status' => Order::STATUS[rand(0, count(Order::STATUS) - 1)],
    ];
})->afterCreating(Order::class, function (Order $order) {
    factory(Product::class)->times(3)->create()->map(function(Product $product) use ($order) {
        $order->item()->create([
            'orderizable_id' => $product->id,
            'orderizable_type' => get_class($product),
            'size' => Product::$sizes[rand(0, count(Product::$sizes) - 1)]
        ]);
    });
});
