<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
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
    }

    /**
     * Should get dashboard products.
     */
    public function testGetDashboardProducts()
    {
        $this->json('GET', 'dashboard/products')
            ->assertOk();
    }

    /**
     * Should get dashboard product form view.
     */
    public function testGetDashboardCreateProductForm()
    {
        $this->json('GET', 'dashboard/products/upload')
            ->assertOk();
    }
}
