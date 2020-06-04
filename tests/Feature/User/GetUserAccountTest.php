<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetUserAccountTest extends TestCase
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
     * Should get user account setting page.
     */
    public function testGetUserAccountPage()
    {
        $this->json('GET', 'my/account')
            ->assertOk();
    }
}
