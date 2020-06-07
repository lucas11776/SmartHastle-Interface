<?php

namespace Tests;

use App\Role;
use Tests\Mocks\Mocks;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations, Mocks;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        Artisan::call('db:seed');

        $this->applicationRoles();
    }

    /**
     * Create application roles.
     */
    private function applicationRoles()
    {
        foreach (Role::ROLES as $role) {
            Role::create(['name' => $role]);
        }
    }
}
