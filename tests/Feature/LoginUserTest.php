<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Faker\Factory as Faker;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\TestResponse;

class LoginUserTest extends TestCase
{
    /**
     * Should login user and redirect to redirect home page
     */
    public function testLogin()
    {
        $credentials = [
            'email' => factory(User::class)->create()->email,
            'password' => 'password'
        ];

        $this->login($credentials)
            ->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * Should try to login with empty data.
     */
    public function testLoginWithEmptyData()
    {
        $this->login([])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'email', 'password'
                ]
            ]);
    }

    /**
     * Should try to login with email that does not exist.
     */
    public function testLoginWithNonExistingEmail()
    {
        $credentials = [
            'email' => Faker::create()->unique()->email,
            'password' => 'password'
        ];

        $this->login($credentials)
            ->assertJsonStructure([
                'message',
                'errors' => ['email']
            ]);
    }

    /**
     * Make request to register user in application.
     *
     * @param array $credentials
     * @return TestResponse
     */
    protected function login(array $credentials): TestResponse
    {
        return $this->json('POST', 'login', $credentials);
    }
}
