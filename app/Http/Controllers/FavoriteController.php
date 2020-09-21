<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Favorite;
use App\Http\Requests\FavoriteRequest;
use Illuminate\Http\RedirectResponse;
use Exception;

class FavoriteController extends Controller
{
    /**
     * Add new favorite item.
     *
     * @param FavoriteRequest $favoriteRequest
     * @return RedirectResponse
     */
    public function create(FavoriteRequest $favoriteRequest)
    {
        $data = $favoriteRequest->validated();

        auth()->user()->favorites()->where($data)->firstOrCreate($data);

        return redirect()->back()->with('success', 'Item has been added to your favorites.');
    }

    /**
     * Clear user favorites items.
     *
     * @return RedirectResponse
     */
    public function clear()
    {
        auth()->user()->favorites()->delete();

        return redirect()->back()->with('info', 'Your favorites list has been cleared.');
    }

    /**
     * Move item to cart
     *
     * @param Favorite $favorite
     * @return RedirectResponse
     * @throws Exception
     */
    public function toCart(Favorite $favorite)
    {
        auth()->user()->favorites()->where($favorite->only(['favoriteable_id', 'favoriteable_type']))->firstOrFail();

        $this->moveFavoriteToCart($favorite);
        $favorite->delete();

        return redirect()->back()->with('message', 'Favorite has been moved to cart.');
    }

    /**
     * Delete user favorite item.
     *
     * @param Favorite $favorite
     * @return RedirectResponse
     */
    public function destroy(Favorite $favorite)
    {
        auth()->user()
            ->favorites()
            ->where('id', $favorite->id)
            ->firstOrFail()
            ->delete();

        return redirect()->back()
            ->with('success', 'Item has been delete in favorites.');
    }

    /**
     * Move user favorite item to cart.
     *
     * @param Favorite $favorite
     * @return cart
     */
    protected function moveFavoriteToCart(Favorite $favorite): Cart
    {
        return auth()->user()->cart()->create([
            'cartable_id' => $favorite->favoriteable_id,
            'cartable_type' => $favorite->favoriteable_type,
        ]);
    }
}
