<?php

namespace App\Http\Controllers;

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

        return view('checkout.summary', ['cart' => $cart]);
    }
}
