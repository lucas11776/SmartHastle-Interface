<?php

namespace Tests\Feature\Product;

use App\Product;
use Tests\TestCase;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\TestResponse;

class CreateProductTest extends TestCase
{
    /**
     * Should create new product in storage.
     */
    public function testCreateProduct()
    {
        $data = $this->ProductMock();

        $this->createProduct($data)
            ->assertRedirect();

        foreach ($data['image'] as $image) {
            Storage::disk('public')->assertExists($image->hashName());
        }
    }

    /**
     * Should try to create product with  empty data.
     */
    public function testCreateProductWithEmptyData()
    {
        $this->createProduct([])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'category_id',
                    'name',
                    'price',
                    'description'
                ]
            ]);
    }

    /**
     * Should try to create product with invalid category id.
     */
    public function testCreateProductWithInvalidCategoryId()
    {
        $data = $this->ProductMock();

        $data['category_id'] = rand(20, 44);

        $this->createProduct($data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'category_id'
                ]
            ]);
    }

    /**
     * Should try to create product with existing product name.
     */
    public function testCreateProductWithExistingProductName()
    {
        $data = $this->ProductMock();

        $data['name'] = factory(Product::class)->create()->name;

        $this->createProduct($data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'name'
                ]
            ]);
    }

    /**
     * Make request to create product.
     *
     * @param array $data
     * @return TestResponse
     */
    public function createProduct(array $data): TestResponse
    {
        return $this->json('POST', 'product', $data);
    }
}
