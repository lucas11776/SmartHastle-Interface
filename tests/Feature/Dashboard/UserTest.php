<?php

namespace Tests\Feature\Dashboard;

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
     * Should get all user favorite products.
     */
    public function testGetDashboardUserFavorites()
    {
        $user = User::first();

        $this->json('GET', 'dashboard/users/' . $user->id . '/favorites')
            ->assertOk();
    }
}
