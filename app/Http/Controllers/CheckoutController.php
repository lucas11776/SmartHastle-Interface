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
        return view('checkout.summary', [
            'user' => auth()->user(),
        ]);
    }
}
