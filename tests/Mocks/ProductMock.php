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
            'image' =>  [
                UploadedFile::fake()->create('front.png', 1200),
                UploadedFile::fake()->create('back.png', 1050),
                UploadedFile::fake()->create('left.png', 1500),
                UploadedFile::fake()->create('right.png', 1435),
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
