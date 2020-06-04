<?php

namespace Tests\Feature\Cart;

use App\Cart;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class ClearCartTest extends TestCase
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
     * Should clear all items in user cart.
     */
    public function testClearCart()
    {
        $user =  auth()->user();

        factory(Cart::class)
            ->times(10)
            ->create(['user_id' => $user->id]);

        $this->clearCart()
            ->assertRedirect();
        $this->assertEquals(0, $user->cart()->count());
    }

    /**
     * Make request to clear user cart.
     *
     * @return TestResponse
     */
    protected function clearCart(): TestResponse
    {
        return $this->json('POST', 'cart/clear');
    }
}
