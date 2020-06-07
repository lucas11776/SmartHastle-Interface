<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * Get user checkout summary page.
     *
     * @return Factory|View
     */
    public function index()
    {
        $cart = auth()->user()->cart;
        $cartSum = $cart->sum(function(Cart $cart) {
            return $cart->cartable->price;
        });

        return view('checkout.summary', [
            'cart' => $cart,
            'total' => $cartSum
        ]);
    }
}
