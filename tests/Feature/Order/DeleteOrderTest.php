<?php

namespace Tests\Feature\Order;

use App\Order;
use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DeleteOrderTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loginAsStaff();
    }

    /**
     * Should delete order.
     */
    public function testDeleteOrder()
    {
        $order = factory(Order::class)->create();

        $this->deleteOrder($order->id)
            ->assertRedirect();
        $this->assertNull(Order::where('id', $order->id)->first());
    }

    /**
     * Make request to delete order id.
     *
     * @param int $id
     * @param array $data
     * @return TestResponse
     */
    protected function deleteOrder(int $id, array $data = []): TestResponse
    {
        return $this->json('DELETE', 'order/' . $id, $data);
    }
}
