<?php

namespace Tests;

use Tests\Mocks\Mocks;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseMigrations, Mocks;

    public function setUp(): void
    {
        parent::setUp();
        Artisan::call('db:seed');
    }
}
