<?php

namespace Tests\Feature\Cart;

use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class AddProductToCartTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loginAsUser();
    }

    /**
     * Should add product to cart.
     */
    public function testAddProductToCart()
    {
        $data = $this->CartMock();

        $this->addProductToCart($data)
            ->assertRedirect();
    }

    /**
     * Should try to add product with empty data.
     */
    public function testAddProductToCartWithEmptyData()
    {
        $this->addProductToCart([])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'cartable_id',
                    'cartable_type'
                ]
            ]);
    }

    /**
     * Should try to add invalid product id.
     */
    public function testAddProductToCartWithInvalidProductId()
    {
        $data = $this->CartMock();

        $data['cartable_id'] = rand(33, 99);

        $this->addProductToCart($data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'cartable_id'
                ]
            ]);
    }

    /**
     * Make request to add product to cart in application.
     *
     * @param array $data
     * @return TestResponse
     */
    protected function addProductToCart(array $data): TestResponse
    {
        return $this->json('POST', 'cart', $data);
    }
}
