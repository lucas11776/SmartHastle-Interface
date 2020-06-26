<?php

namespace Tests\Feature;

use App\Order;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetSingleOrderTest extends TestCase
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
            ->times(2)
            ->create(['user_id' => auth()->user()->id]);
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGetSingleOrder()
    {
        $order = auth()->user()->orders()->first();

        $this->getOrder($order->id)
            ->assertOk();
    }

    /**
     * Should try to get invalid user order.
     */
    public function testGetInvalidOrder()
    {
        $this->getOrder(rand(44,88))
            ->assertJsonStructure(['message']);
    }

    /**
     * Get user single order.
     *
     * @param int $id
     * @return TestResponse
     */
    protected function getOrder(int $id): TestResponse
    {
        return $this->json('GET', 'my/orders/' . $id);
    }
}
