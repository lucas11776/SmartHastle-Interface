<?php

namespace Tests\Feature\Product;

use App\Category;
use App\Product;
use Faker\Factory;
use Illuminate\Foundation\Testing\TestResponse;
use Tests\TestCase;

class GetProductsByCategoryTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $categories = factory(Category::class)
            ->times(4)
            ->create();
        factory(Product::class)
            ->times(2)
            ->create(['category_id' => $categories->first()->id]);
    }

    /**
     * Should get products by category.
     */
    public function testGetProducts()
    {
        $category = Category::query()
            ->first();

        $this->getProductsByCategory($category->slug)
            ->assertOk();
    }

    /**
     * Should try to get products with invalid category name.
     */
    public function testGetProductsWithInvalidCategoryName()
    {
        $this->getProductsByCategory(Factory::create()->name)
            ->assertJsonStructure([
                'message'
            ]);
    }

    /**
     * Make request to get product by category.
     *
     * @param string $slug
     * @return TestResponse
     */
    protected function getProductsByCategory(string $slug): TestResponse
    {
        return $this->json('GET', 'categories/' . $slug);
    }
}
