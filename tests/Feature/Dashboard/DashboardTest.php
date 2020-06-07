<?php

namespace Tests\Feature\Dashboard;

use App\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
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
     * Should get dashboard summary.
     */
    public function testGetDashboard()
    {
        $this->json('GET','dashboard')
            ->assertOk();
    }
}
