<?php

namespace Tests\Feature\Order;

use App\Cart;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class CreateOrderCartTest extends TestCase
{
    private const NumItemCart = 5;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loginAsUser();

        factory(Cart::class)
            ->times(self::NumItemCart)
            ->create(['user_id' => auth()->user()->id]);
    }

    /**
     * Should create new order using item in cart.
     */
    public function testCreateOrder()
    {
        $this->createOrder()
            ->assertRedirect('my/orders');

        $this->assertEquals(
            auth()->user()->orders->first()->items()->count(),
            self::NumItemCart
        );
    }

    /**
     * Should try to create order with empty cart.
     */
    public function testCreateOrderWithEmptyCart()
    {
        $this->createOrder()
            ->assertRedirect();
    }

    /**
     * Make request to create new order.
     *
     * @param array $data
     * @return TestResponse
     */
    protected function createOrder(array $data = []): TestResponse
    {
        return $this->json('POST', 'order', $data);
    }
}
