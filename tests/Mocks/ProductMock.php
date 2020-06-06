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
                UploadedFile::fake()->image('front.png', 550, 550),
                UploadedFile::fake()->image('back.png', 500, 530),
                UploadedFile::fake()->image('left.png', 543, 583),
                UploadedFile::fake()->image('right.png', 545, 535),
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
