<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Illuminate\Routing\Redirector;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\RedirectResponse;

class OrderController extends Controller
{
    /**
     * Create new user order in the storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function store()
    {
        $cart = $this->cartToOrderItems();
        $data = [
            'user_id' => auth()->user()->id,
            'status' => 'waiting'
        ];

        $this->create($data)->item()->createMany($cart);

        return redirect('my/orders');
    }

    /**
     * Update order in storage.
     *
     * @param Order $order
     * @param OrderRequest $orderRequest
     * @return RedirectResponse
     */
    public function update(Order $order, OrderRequest $orderRequest)
    {
        $order->update($orderRequest->validated());

        return redirect()->back();
    }

    /**
     * Create order in storage.
     *
     * @param array $data
     * @return Order
     */
    protected function create(array $data): Order
    {
        return Order::create([
            'user_id' => $data['user_id'],
            'status' => $data['status']
        ]);
    }

    /**
     * Get all user cart items as order items.
     *
     * @return array
     */
    protected function cartToOrderItems(): array
    {
        return auth()->user()->cart->map(function (Cart $cart) {
            return [
                'orderizable_id' => $cart->cartable_id,
                'orderizable_type' => $cart->cartable_type,
                'size' => $cart->size
            ];
        })->toArray();
    }
}
