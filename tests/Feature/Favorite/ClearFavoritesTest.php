<?php

namespace Tests\Feature\Favorite;

use App\Favorite;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class ClearFavoritesTest extends TestCase
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

        factory(Favorite::class)
            ->times(3)
            ->create(['user_id' => auth()->user()->id]);
    }

    /**
     * Should clear all user favorites items.
     */
    public function testClearFavorites()
    {
        $this->clearFavorites()
            ->assertRedirect()
            ->assertSessionHas('info');

        $favoritesCount = auth()->user()
            ->favorites()
            ->count();

        $this->assertEquals(0, $favoritesCount);
    }

    /**
     * Make request to clear all user favorite items.
     *
     * @return TestResponse
     */
    protected function clearFavorites(): TestResponse
    {
        return $this->json('DELETE', 'favorite/clear');
    }
}
