<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\TestResponse;

class RegisterTest extends TestCase
{
    /**
     * Should register new user account.
     */
    public function testRegister()
    {
        $data = $this->RegisterMock();

        $this->register($data)
            ->assertRedirect(RouteServiceProvider::HOME);
    }

    /**
     * Should try to register with empty data.
     */
    public function testRegisterWithEmptyData()
    {
        $this->register([])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'first_name', 'last_name', 'email', 'password'
                ]
            ]);
    }

    /**
     * Make request to register user account.
     *
     * @param array $data
     * @return TestResponse
     */
    protected function register(array $data): TestResponse
    {
        return $this->json('POST', 'register', $data);
    }
}
