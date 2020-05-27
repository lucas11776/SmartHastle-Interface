<?php

namespace Tests\Mocks;

use Faker\Factory as Faker;

trait CategoryMock
{
    public function CategoryMock()
    {
        return [
            'name' => Faker::create()->unique()->name
        ];
    }
}
