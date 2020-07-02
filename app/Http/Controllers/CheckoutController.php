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
        $user =  auth()->user();
        $orderWaiting = auth()->user()
            ->orders()
            ->where('status', 'waiting')
            ->count() > 0;

        return view('checkout.summary', [
            'user' => $user,
            'orderWaiting' => $orderWaiting
        ]);
    }
}
