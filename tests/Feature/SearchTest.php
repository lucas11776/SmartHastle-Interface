<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class SearchTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        factory(Product::class)
            ->times(rand(5, 10))
            ->create();
    }

    /**
     * Should search for a product in database.
     */
    public function testSearchForProduct()
    {
        $product = Product::query()->find(3);

        $this->search($product->name)
            ->assertOk();
    }

    /**
     * Make request to search product.
     *
     * @param string $query
     * @return TestResponse
     */
    public function search(string $query): TestResponse
    {
        return $this->json('GET', 'search?q=' . $query);
    }
}
