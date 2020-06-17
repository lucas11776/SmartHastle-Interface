<?php

namespace Tests\Feature\Favorite;

use App\Favorite;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MoveFavoriteToCartTest extends TestCase
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

        factory(Favorite::class)->times(2)->create(['user_id' => auth()->user()->id]);
    }

    /**
     * Should move user favorite item to cart.
     */
    public function testMoveFavoriteToCart()
    {
        $favoriteItem = auth()->user()->favorites()->first();

        $this->moveFavoriteToCart($favoriteItem->id)
            ->assertRedirect();

        $cartItem = auth()->user()->cart()->where([
            'cartable_id' => $favoriteItem->favoriteable_id,
            'cartable_type' => $favoriteItem->favoriteable_type
        ])->first();

        $this->assertNotNull($cartItem);
    }

    /**
     * Should try to move favorite item that does not belong to user.
     */
    public function testMoveFavoriteNotBelongingUserToCart()
    {
        $newUser = factory(User::class)->create();
        $newUserFavoriteItem = factory(Favorite::class)->create([
            'user_id' => $newUser->id
        ]);

        $this->moveFavoriteToCart($newUserFavoriteItem->id)
            ->assertJsonStructure(['message']);
    }

    /**
     * Make request to move favorite item to cart.
     *
     * @param int $favoriteId
     * @return TestResponse
     */
    protected function moveFavoriteToCart(int $favoriteId): TestResponse
    {
        return $this->json('DELETE', "favorite/{$favoriteId}/to/cart");
    }
}
