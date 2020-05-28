<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Product;
use Faker\Factory;
use Faker\Generator as Faker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'category_id' => factory(Category::class)->create()->id,
        'name' => $name = $faker->company,
        'slug' => Str::slug($name),
        'brand' => $faker->name,
        'price' => $price = rand(45, 350),
        'discount' => rand(1,10) % 2 == 0 ? $price / rand(2,3) : null
    ];
})->afterCreating(Product::class, function (Product $product) {
    $productImages = [
        UploadedFile::fake()->create('front.png', 1000 * 2),
        UploadedFile::fake()->create('back.jpg', 1000 * 1.5),
        UploadedFile::fake()->create('side.jpeg', 1000 * 1.9),
    ];
    collect($productImages)->map(function(UploadedFile $image) use ($product) {
        return $product->image()->create([
            'path' => $path = $image->store('public'),
            'url' => url($path)
        ]);
    });
});
