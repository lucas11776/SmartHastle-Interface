<?php

namespace Tests\Feature\Dashboard;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
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
     * Should get dashboard categories.
     */
    public function testGetDashboardCategories()
    {
        $this->json('GET', 'dashboard/categories')
            ->assertOk();
    }

    /**
     * Should get dashboard create category form.
     */
    public function testGetDashboardCreateCategoryForm()
    {
        $this->json('GET', 'dashboard/categories/create')
            ->assertOk();
    }
}
