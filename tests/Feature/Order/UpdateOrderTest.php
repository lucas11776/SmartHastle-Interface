<?php

namespace Tests\Feature\Order;

use App\Order;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class UpdateOrderTest extends TestCase
{
    /**
     * @var Order
     */
    private $order;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loginAsUser();

        $this->order = factory(Order::class)
            ->create([
                'user_id' => auth()->user()->id,
                'status' => 'waiting'
            ]);
    }

    /**
     * Should update order.
     */
    public function testUpdateOrder()
    {
        $data = [
            'status' => 'approved'
        ];

        $this->updateOrder($this->order->id, $data)
            ->assertRedirect();
        $this->assertEquals(
            'approved',
            $this->order->refresh()->status
        );
    }

    /**
     * Should try to update order with empty data.
     */
    public function testUpdateOrderWithEmptyData()
    {
        $this->updateOrder($this->order->id, [])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'status'
                ]
            ]);
    }

    /**
     * Should try to update order with empty data.
     */
    public function testUpdateOrderWithInvalidStatus()
    {
        $data = [
            'status' => 'canceled'
        ];

        $this->updateOrder($this->order->id, $data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'status'
                ]
            ]);
    }

    /**
     * Make request to update order.
     *
     * @param int $id
     * @param $data
     * @return TestResponse
     */
    protected function updateOrder(int $id, array $data): TestResponse
    {
        return $this->json('PATCH', 'order/' . $id, $data);
    }
}
