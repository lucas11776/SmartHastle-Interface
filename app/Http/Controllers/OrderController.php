<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Order;
use Exception;
use Illuminate\View\View;
use Illuminate\Routing\Redirector;
use App\Http\Requests\OrderRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\View\Factory;

class OrderController extends Controller
{
    /**
     * Get user orders.
     *
     * @return Factory|View
     */
    public function index()
    {
        $orders = auth()->user()
            ->orders()
            ->orderBy('created_at', 'DESC')
            ->paginate(12);

        return view('user.orders', ['orders' => $orders]);
    }

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

        auth()->user()->cart()->delete();

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
     * Should delete order in storage.
     *
     * @param Order $order
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Order $order)
    {
        $order->items()->delete();
        $order->delete();

        return redirect('dashboard/orders');
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
