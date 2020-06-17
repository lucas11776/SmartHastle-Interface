<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Favorite;
use App\Http\Requests\FavoriteRequest;
use Illuminate\Http\RedirectResponse;

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

        return redirect()->back()
            ->with('success', 'Item has been add to your favorites.');
    }

    /**
     * Move item to cart
     *
     * @param Favorite $favorite
     * @return RedirectResponse
     */
    public function toCart(Favorite $favorite)
    {
        $favoriteItem = auth()->user()->favorites()->where($favorite->only([
            'favoriteable_id', 'favoriteable_type'
        ]))->firstOrFail();

        $this->moveFavoriteToCart($favorite);
        $favoriteItem->delete();

        return redirect()->back()
            ->with('message', 'Favorite has been moved to cart.');
    }

    /**
     * Delete user favorite item.
     *
     * @param Favorite $favorite
     * @return RedirectResponse
     */
    public function destroy(Favorite $favorite)
    {
        auth()->user()->favorites()->where('id', $favorite->id)->firstOrFail()->delete();

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
