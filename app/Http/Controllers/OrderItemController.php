<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemRequest;
use App\Order;
use App\OrderItem;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    /**
     * Update order item.
     *
     * @param Order $order
     * @param OrderItem $orderItem
     * @param OrderItemRequest $orderItemRequest
     * @return RedirectResponse
     */
    public function update(Order $order, OrderItem $orderItem, OrderItemRequest $orderItemRequest)
    {
        $orderItem = $order->items()->where('id', $orderItem->id)->firstOrFail();

        $orderItem->update($orderItemRequest->validated());

        return redirect()
            ->back()
            ->with('message', "Order item {$orderItem->product->name} has been updated.");
    }
}
