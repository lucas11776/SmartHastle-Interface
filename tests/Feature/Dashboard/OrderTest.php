<?php

namespace Tests\Feature\Dashboard;

use App\Order;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class OrderTest extends TestCase
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
    }

    /**
     * Should get dashboard order view.
     */
   public function testGetDashboardOrders()
   {
        $this->json('GET', 'dashboard/orders')
            ->assertOk();
   }

   /**
    * should get user single order.
    */
   public function testGetDashboardSingleOrder()
   {
        $order = factory(Order::class)->create();

        $this->json('GET', 'dashboard/orders/' . $order->id)
            ->assertOk();
   }

    /**
     * Should get orders by status.
     */
   public function testGetDashboardOrderByStatus()
   {
       factory(Order::class)->times(5)->create();

       $this->json('GET', 'dashboard/orders/status/completed')
           ->assertOk();
   }
}
