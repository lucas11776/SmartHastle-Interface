<?php

namespace Tests\Feature\Cart;

use App\Cart;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class DeleteItemInCartTest extends TestCase
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
     * Should delete item in user cart.
     */
    public function testDeleteItemInCart()
    {
        $data = [
            'id' => factory(Cart::class)->create(['user_id' => auth()->user()->id])->id
        ];

        $this->deleteItemCart($data)
            ->assertRedirect();
    }

    /**
     * Should try to delete item in cart with empty data.
     */
    public function testDeleteItemInCartWithEmptyData()
    {
        $this->deleteItemCart([])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'id'
                ]
            ]);
    }

    /**
     * Should try to delete item in cart with invalid item id.
     */
    public function testDeleteItemInCartWithInvalidItem()
    {
        $data = [
            'id' => rand(44, 88)
        ];

        $this->deleteItemCart($data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'id'
                ]
            ]);
    }

    /**
     * Make request to delete item in user cart.
     *
     * @param array $data
     * @return TestResponse
     */
    protected function deleteItemCart(array $data): TestResponse
    {
        return $this->json('DELETE', 'cart', $data);
    }
}
