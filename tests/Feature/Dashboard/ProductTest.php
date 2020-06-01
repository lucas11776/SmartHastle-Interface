<?php

namespace Tests\Feature\Dashboard;

use App\Product;
use App\User;
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

    /**
     * Should get dashboard edit product form.
     */
    public function testGetDashboardEditProductForm()
    {
        $product = factory(Product::class)->create();

        $this->json('GET', 'dashboard/products/' . $product->id)
            ->assertOk();
    }
}
