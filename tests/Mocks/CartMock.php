<?php

namespace Tests\Mocks;

use App\Product;

trait CartMock
{
    public function CartMock(): array
    {
        return [
            'cartable_id' => factory($class = Product::class)->create()->id,
            'cartable_type' => $class,
            'size' => ''
        ];
    }
}
