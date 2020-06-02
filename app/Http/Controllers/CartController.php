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
        $carts = auth()->user()->cart()->paginate(15);

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
        $data = array_merge($cartRequest->validated(), ['user_id' => auth()->user()->id]);

        $this->create($data);

        return redirect()->back();
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

        auth()->user()->cart()->delete('id', $data['id']);

        return redirect()->back();
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
