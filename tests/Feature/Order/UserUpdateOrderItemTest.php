<?php

namespace Tests\Feature\Order;

use App\Order;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class UserUpdateOrderItemTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loginAsUser();

        factory(Order::class)
            ->create(['user_id' => auth()->user()->id, 'status' => 'waiting']);
    }

    public function testUpdateOrderItem()
    {
        $order = auth()->user()->orders()->first();
        $item = $order->items()->first();
        $data = [
            'size' => $item->size != Product::$sizes[0] ? Product::$sizes[0] : Product::$sizes[1]
        ];

        $this->updateOrderItem($order->id, $item->id, $data)
            ->assertRedirect();

        $this->assertEquals($data['size'], $item->fresh()->size);
    }

    /**
     * Should try to update order item if order is not in waiting list.
     */
    public function testUpdateOrderItemWithOrderNotInWaitingList()
    {
        $order = auth()->user()->orders()->first();
        $item = $order->items()->first();
        $itemSize = $item->size;
        $data = [
            'size' => $item->size != Product::$sizes[0] ? Product::$sizes[0] : Product::$sizes[1]
        ];

        $order->update(['status' => 'completed']);

        $this->updateOrderItem($order->id, $item->id, $data)
            ->assertRedirect();

        $this->assertEquals($itemSize, $item->fresh()->size);
    }

    /**
     * Make request to update user order item size.
     *
     * @param int $orderId
     * @param int $itemId
     * @param array $data
     * @return TestResponse
     */
    protected function updateOrderItem(int $orderId, int $itemId, array $data): TestResponse
    {
        return $this->json('POST', 'order/' . $orderId . '/item/' . $itemId, $data);
    }
}
