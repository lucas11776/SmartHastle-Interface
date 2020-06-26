<?php

namespace Tests\Feature\Dashboard;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\WithFaker;

class SearchTest extends TestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        factory(User::class)
            ->times(rand(3,13))
            ->create();

        $this->loginAsAdministrator();
    }

    /**
     * Should search for user.
     */
    public function testSearchForUser()
    {
        $user = User::query()->firstOr();
        $userFullName = $user->first_name . ' ' . $user->last_name;

        $this->dashboardSearch($userFullName)
            ->assertOk();
    }

    /**
     * Make request to search for user in database.
     *
     * @param string $query
     * @return TestResponse
     */
    protected function dashboardSearch(string $query): TestResponse
    {
        return $this->json('GET', 'dashboard/search?q=' . $query);
    }
}
