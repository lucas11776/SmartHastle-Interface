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
        $user = factory(User::class)->create();

        $this->json('GET', 'dashboard/users/' . $user->id)
            ->assertOk();
    }

    /**
     * Should get single user orders.
     */
    public function testGetDashboardSingleUserOrders()
    {
        $user = factory(User::class)->create();

        $this->json('GET', 'dashboard/users/' . $user->id . '/orders')
            ->assertOk();
    }
}
