<?php

namespace Tests\Feature\Dashboard;

use App\Order;
use App\User;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        factory(User::class)->times(2)->create();

        $this->loginAsAdministrator();
    }

    /**
     * Should get dashboard users accounts.
     */
    public function testGetDashboardUsers()
    {
        $this->json('GET', 'dashboard/users')
            ->assertOk();
    }

    /**
     * Should get user by role in database.
     */
    public function testGetDashboardUsersByRole()
    {
        $this->json('GET', 'dashboard/users/role/staff')
            ->assertOk();
    }

    /**
     * Should get single user account.
     */
    public function testGetDashboardSingleUserAccount()
    {
        $user = User::first();

        $this->json('GET', 'dashboard/users/' . $user->id)
            ->assertOk();
    }

    /**
     * Should get single user orders.
     */
    public function testGetDashboardUserOrders()
    {
        $user = User::first();

        $this->json('GET', 'dashboard/users/' . $user->id . '/orders')
            ->assertOk();
    }

    /**
     * Should get single user order in dashboard.
     */
    public function testGetDashboardUserSingleOrder()
    {
        $user = User::query()->first();
        $order = factory(Order::class)
            ->create(['user_id' => $user->id, 'status' => 'approved']);

        $this->json('GET', 'dashboard/users/' . $user->id . '/orders/' . $order->id)
            ->assertOk();
    }

    /**
     * Should get all user favorite products.
     */
    public function testGetDashboardUserFavorites()
    {
        $user = User::first();

        $this->json('GET', 'dashboard/users/' . $user->id . '/favorites')
            ->assertOk();
    }

    /**
     * Should get all user product in cart.
     */
    public function testGetDashboardUserCart()
    {
        $user = User::first();

        $this->json('GET', 'dashboard/users/' . $user->id . '/cart')
            ->assertOk();
    }
}
