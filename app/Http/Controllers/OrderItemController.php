<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderItemRequest;
use App\Order;
use App\OrderItem;
use Illuminate\Http\Request;

class OrderItemController extends Controller
{
    public function update(Order $order, OrderItem $orderItem, OrderItemRequest $orderItemRequest)
    {
        $orderItem = $order->items()->where('id', $orderItem->id)->firstOrFail();

        $orderItem->update($orderItemRequest->validated());

        return redirect()->back()->with('message', "Order item {$orderItem->product->name} has been updated.");
    }
}
