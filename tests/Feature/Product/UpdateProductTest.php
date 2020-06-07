<?php

namespace Tests\Feature\Product;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class UpdateProductTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loginAsAdministrator();
    }

    /**
     * Should update product.
     */
    public function testUpdateProduct()
    {
        $id = ($product = factory(Product::class)->create())->id;
        $data = $this->ProductMock();

        unset($data['image']);

        $this->updateProduct($id, $data)
            ->assertRedirect();
    }

    /**
     * Should update product with empty data.
     */
    public function testUpdateProductWithEmptyData()
    {
        $id = ($product = factory(Product::class)->create())->id;

        $this->updateProduct($id, [])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'category_id',
                    'name',
                    'price',
                    'description',
                ]
            ]);
    }

    /**
     * Should update product with existing product name.
     */
    public function testUpdateProductWithExistingProductName()
    {
        $id = ($product = factory(Product::class)->create())->id;
        $data = $this->ProductMock();
        $data['name'] = factory(Product::class)->create()->name;

        unset($data['image']);

        $this->updateProduct($id, [])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'name',
                ]
            ]);
    }

    /**
     * Make request to update product in database.
     *
     * @param int $id
     * @param array $data
     * @return TestResponse
     */
    protected function updateProduct(int $id, array $data): TestResponse
    {
        return $this->json('PATCH', 'product/' . $id, $data);
    }
}
