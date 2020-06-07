<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
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
}
