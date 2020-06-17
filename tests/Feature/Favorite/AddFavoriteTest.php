<?php

namespace Tests\Feature\Favorite;

use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class AddFavoriteTest extends TestCase
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

        factory(Product::class)->times(2)->create();
    }

    /**
     * Add product to favorites.
     */
    public function testAddProductToFavorite()
    {
        $data = [
            'favoriteable_id' => ($product = Product::first())->id,
            'favoriteable_type' => get_class($product)
        ];

        $this->addFavorite($data)
            ->assertRedirect();

        $this->assertNotNull(auth()->user()->favorites()->where($data)->get());
    }

    /**
     * Should try to add favorite with empty data.
     */
    public function testAddProductToFavoriteWithEmptyData()
    {
        $this->addFavorite([])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'favoriteable_id',
                    'favoriteable_type'
                ]
            ]);
    }

    /**
     * Should try to add favorite with empty product id.
     */
    public function testAddProductToFavoriteWithInvalidProductId()
    {
        $data = [
            'favoriteable_id' => ($product = Product::first())->id + 11,
            'favoriteable_type' => get_class($product)
        ];

        $this->addFavorite($data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'favoriteable_id'
                ]
            ]);
    }

    /**
     * Should try to add un-favoriteable type.
     */
    public function testAddUserToFavorite()
    {
        $data = [
            'favoriteable_id' => ($user = auth()->user())->id,
            'favoriteable_type' => get_class($user)
        ];

        $this->addFavorite($data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'favoriteable_type'
                ]
            ]);
    }

    /**
     * Make request to add item to favorite.
     *
     * @param array $data
     * @return TestResponse
     */
    protected function addFavorite(array $data): TestResponse
    {
        return $this->json('POST', 'favorite', $data);
    }
}
