<?php

namespace Tests\Feature\User;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestResponse;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ChangePasswordTest extends TestCase
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
     * Should change use password.
     */
    public function testChangePassword()
    {
        $data = [
            'old_password' => 'password',
            'password' => 'test1234',
            'password_confirmation' => 'test1234'
        ];

        $this->changePassword($data)
            ->assertRedirect();
    }

    /**
     * Should try to change password with invalid old password.
     */
    public function testChangePasswordWithInvalidOldPassword()
    {
        $data = [
            'old_password' => 'passes123',
            'password' => 'test1234',
            'password_confirmation' => 'test1234'
        ];

        $this->changePassword($data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'old_password'
                ]
            ]);
    }

    public function testChangePasswordWithNotMatchingPasswordConfirmation()
    {
        $data = [
            'old_password' => 'password',
            'password' => 'test1234',
            'password_confirmation' => 'test12345'
        ];

        $this->changePassword($data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'password'
                ]
            ]);
    }

    /**
     * Should try to change user password with empty data.
     */
    public function testChangePasswordWithEmptyData()
    {
        $this->changePassword([])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'old_password',
                    'password'
                ]
            ]);
    }

    /**
     * Make request to change user password.
     *
     * @param array $data
     * @return TestResponse
     */
    protected function changePassword(array $data): TestResponse
    {
        return $this->json('POST', 'user/password/change', $data);
    }
}
