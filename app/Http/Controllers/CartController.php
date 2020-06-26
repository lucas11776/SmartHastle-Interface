<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\CartRequest;
use App\Http\Requests\ItemInCartRequest;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Get user cart page.
     *
     * @return Factory|View
     */
    public function index()
    {
        $carts = auth()->user()
            ->cart()
            ->orderBy('id', 'DESC')
            ->paginate(15);

        return view('cart.items', ['items' => $carts]);
    }

    /**
     * Store new item in cart.
     *
     * @param CartRequest $cartRequest
     * @return RedirectResponse
     */
    public function store(CartRequest $cartRequest)
    {
        $data = array_merge(
            $cartRequest->validated(),
            ['user_id' => auth()->user()->id]
        );

        $this->create($data);

        return redirect()
            ->back()
            ->with('success', 'Item has been add to cart.');
    }

    /**
     * Update item in cart.
     *
     * @param ItemInCartRequest $inCartRequest
     * @param CartRequest $cartRequest
     * @return RedirectResponse
     */
    public function update(ItemInCartRequest $inCartRequest, CartRequest $cartRequest)
    {
        auth()->user()
            ->cart()
            ->where('id', $inCartRequest->validated()['id'])
            ->update($cartRequest->validated());

        return redirect()
            ->back()
            ->with('success', 'Item has been updated in cart.');
    }

    /**
     * Clear user cart and redirect.
     *
     * @return RedirectResponse
     */
    public function clear()
    {
        auth()->user()->cart()->delete();

        return redirect()
            ->back()
            ->with('info', 'Cart has been clear successfully.');
    }

    /**
     * Delete item in cart.
     *
     * @param ItemInCartRequest $inCartRequest
     * @return RedirectResponse
     */
    public function destroy(ItemInCartRequest $inCartRequest)
    {
        $data = $inCartRequest->validated();

        auth()->user()->cart()->where('id', $data['id'])->delete();

        return redirect()
            ->back()
            ->with('success', 'Item has been deleted in cart.');
    }

    /**
     * Create new cart item in storage.
     *
     * @param array $data
     * @return Cart
     */
    public function create(array $data): Cart
    {
        return Cart::create([
            'user_id' => $data['user_id'],
            'cartable_id' => $data['cartable_id'],
            'cartable_type' => $data['cartable_type'],
            'size' => $data['size'] ?? null
        ]);
    }
}
