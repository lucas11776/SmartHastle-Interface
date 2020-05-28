<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    /**
     * Should get dashboard view.
     */
    public function testGetDashboard()
    {
        $this->get('dashboard')
            ->assertOk();
    }

    /**
     * Make request to get dashboard.
     *
     * @return TestResponse
     */
    protected function dashboardView(): TestResponse
    {
        return $this->get('dashboard');
    }
}
