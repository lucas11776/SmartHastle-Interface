<?php

namespace Tests\Feature\Cart;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class AddToCartTest extends TestCase
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
     * Should try to add uncartable type to cart.
     */
    public function testAddToCartUncartableType()
    {
        $data = $this->CartMock();

        $data['cartable_type'] = User::class;

        $this->addToCart($data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'cartable_type'
                ]
            ]);
    }

    /**
     * Make request to add item to cart.
     * @param array $data
     * @return TestResponse
     */
    protected function addToCart(array $data): TestResponse
    {
        return $this->json('POST', 'cart', $data);
    }
}
