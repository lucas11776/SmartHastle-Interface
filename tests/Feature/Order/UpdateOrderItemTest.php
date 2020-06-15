<?php

namespace Tests\Feature;

use App\Order;
use App\Product;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class UpdateOrderItemTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loginAsAdministrator();

        factory(Order::class)->times(3)->create();
    }

    /**
     * Should update order item size.
     */
    public function testUpdateOrderItemSize()
    {
        $order = Order::first();
        $orderItem = $order->items()->first();
        $data = [
            'size' => $orderItem->size != Product::$sizes[0] ? Product::$sizes[0] : Product::$sizes[1]
        ];

        $this->updateOrderItem($order->id, $orderItem->id, $data)
            ->assertRedirect();

        $orderItem->refresh();

        $this->assertEquals($data['size'], $orderItem->size);
    }

    /**
     * Should try to update order with empty data.
     */
    public function testUpdateOrderItemWithEmptyData()
    {
        $order = Order::first();
        $orderItem = $order->items()->first();

        $this->updateOrderItem($order->id, $orderItem->id, [])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'size'
                ]
            ]);
    }

    /**
     * Should try update order item with invalid size.
     */
    public function testUpdateOrderItemWithInvalidSize()
    {
        $order = Order::first();
        $orderItem = $order->items()->first();
        $data = ['size' => 'very-small'];

        $this->updateOrderItem($order->id, $orderItem->id, $data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'size'
                ]
            ]);
    }

    /**
     * Make request to update order item.
     *
     * @param int $orderId
     * @param int $itemId
     * @param array $data
     * @return TestResponse
     */
    protected function updateOrderItem(int $orderId, int $itemId, array $data): TestResponse
    {
        return $this->json('PATCH', "order/{$orderId}/item/{$itemId}", $data);
    }
}
