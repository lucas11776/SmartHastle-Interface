<?php

namespace Tests\Feature\User;

use Tests\TestCase;
use Faker\Factory as Faker;
use Illuminate\Foundation\Testing\TestResponse;

class UpdateUserTest extends TestCase
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
     * Should update user profile details.
     */
    public function testUpdateUser()
    {
        $data = [
            'first_name' => ($faker = Faker::create())->firstName,
            'last_name' => $faker->lastName,
            'email' => auth()->user()->email,
            'cellphone_number' => $faker->phoneNumber
        ];

        $this->updateUser($data)
            ->assertRedirect();
    }

    /**
     * Should try to update user profile details with empty data.
     */
    public function testUpdateUserWithEmptyData()
    {
        $this->updateUser([])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'first_name',
                    'last_name',
                    'email'
                ]
            ]);
    }

    /**
     * Make request to update user profile.
     *
     * @param array $data
     * @return TestResponse
     */
    protected function updateUser(array $data): TestResponse
    {
        return $this->json('PATCH', 'user', $data);
    }
}
