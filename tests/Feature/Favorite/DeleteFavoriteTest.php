<?php

namespace Tests\Feature\Favorite;

use App\Favorite;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class DeleteFavoriteTest extends TestCase
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

        factory(Favorite::class)->times(3)->create([
            'user_id' => auth()->user()->id
        ]);
    }

    /**
     * Should delete user favorite item.
     */
    public function testDeleteFavoriteItem()
    {
        $favoriteItem = auth()->user()->favorites;

        $this->deleteFavorite($favoriteItem->first()->id)
            ->assertRedirect();
    }

    /**
     * Should try to delete item that does not belong to user.
     */
    public function testDeleteFavoriteItemNotBelongingToUser()
    {
        $newUser = factory(User::class)->create();
        $newUserFavoriteItem = factory(Favorite::class)->create([
            'user_id' => $newUser->id
        ]);

        $this->deleteFavorite($newUserFavoriteItem->id)
            ->assertJsonStructure(['message']);
    }

    /**
     * Make request to delete favorite item.
     *
     * @param int $favoriteId
     * @return TestResponse
     */
    protected function deleteFavorite(int $favoriteId): TestResponse
    {
        return $this->json('DELETE', 'favorite/' . $favoriteId);
    }
}
