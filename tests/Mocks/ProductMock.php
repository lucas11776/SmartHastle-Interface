<?php

namespace Tests\Mocks;

use App\Category;
use Faker\Factory as Faker;
use Illuminate\Http\UploadedFile;

trait ProductMock
{
    public function ProductMock(): array
    {
        return [
            'image' => [
                UploadedFile::fake()->create('front.png', 1000 * 2),
                UploadedFile::fake()->create('back.jpg', 1000 * 1.5),
                UploadedFile::fake()->create('side.jpeg', 1000 * 1.9),
            ],
            'category_id' => factory(Category::class)->create()->id,
            'name' => ($faker = Faker::create())->company,
            'brand' => $faker->name,
            'price' => $price = rand(45, 350),
            'discount' => rand(1,10) % 2 == 0 ? $price / rand(2,3) : null,
            'description' => $faker->sentence(30)
        ];
    }
}
