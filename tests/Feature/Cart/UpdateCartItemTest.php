<?php

namespace Tests\Feature\Cart;

use App\Cart;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class UpdateCartItemTest extends TestCase
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
     * Should update item in cart.
     */
    public function testUpdateCartItem()
    {
        $user = auth()->user();
        $item = factory(Cart::class)->create(['user_id' => $user->id]);
        $data = [
            'id' => $item->id,
            'cartable_id' => $item->cartable_id,
            'cartable_type' => $item->cartable_type,
            'size' => Product::$sizes[rand(0, count(Product::$sizes) - 1)]
        ];

        $this->updateCart($data)
            ->assertRedirect();
    }

    /**
     * Should try to update cart with empty data.
     */
    public function testUpdateCartItemWithEmptyData()
    {
        $this->updateCart([])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'id'
                ]
            ]);
    }

    /**
     * Should try to update cart with id only.
     */
    public function testUpdateCartItemWithCartIdOnly()
    {
        $user = auth()->user();
        $data = [
            'id' => factory(Cart::class)->create(['user_id' => $user->id])->id
        ];

        $this->updateCart($data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'cartable_id',
                    'cartable_type'
                ]
            ]);
    }

    /**
     * Make required to update item in cart.
     *
     * @param array $data
     * @return TestResponse
     */
    protected function updateCart(array $data): TestResponse
    {
        return $this->json('PATCH', 'cart', $data);
    }
}
