<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Http\Requests\CartRequest;
use Illuminate\Http\RedirectResponse;

class CartController extends Controller
{
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
