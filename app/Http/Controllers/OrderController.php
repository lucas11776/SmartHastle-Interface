<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Mail\OrderStaffNotification;
use App\Mail\OrderUserNotification;
use App\Order;
use App\Role;
use Exception;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Mail;
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
        $user = auth()->user();
        $orders = $user->orders()->orderBy('created_at', 'DESC')->paginate(12);

        return view('user.orders', [
            'user' => $user,
            'orders' => $orders,
        ]);
    }

    /**
     * Create new user order in the storage.
     *
     * @return RedirectResponse|Redirector
     */
    public function store()
    {
        $order = $this->createOrderFromCart();

        $this->orderNotification($order);

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
     * Create new order user items in cart.
     *
     * @return Order
     */
    protected function createOrderFromCart(): Order
    {
        $order = auth()->user()->orders()->create(['status' => 'waiting']);

        $order->item()->createMany($this->cartToOrderItems());

        auth()->user()->cart()->delete();

        return $order;
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

    /**
     * Notify user and staff members of new order request.
     *
     * @param Order $order
     */
    protected function orderNotification(Order $order): void
    {
        Mail::to($order->user)->send(new OrderUserNotification($order));
        Mail::to(Role::staff())->send(new OrderStaffNotification($order));
    }
}
