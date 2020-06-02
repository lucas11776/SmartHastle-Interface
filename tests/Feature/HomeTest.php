<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;

class HomeTest extends TestCase
{
    /**
     * Should get application home page.
     */
    public function testGetHomePage()
    {
        $this->json('GET', '/')
            ->assertOk();
    }

    /**
     * Should get application products page.
     */
    public function testGetProducts()
    {
        $this->json('GET', 'products')
            ->assertOk();
    }

    /**
     * Should get single product page.
     */
    public function testGetSingleProduct()
    {
        $product = factory(Product::class)->create();

        $this->json('GET', $product->slug)
            ->assertOk();
    }

}
