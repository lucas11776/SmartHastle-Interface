<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;

class RegisterTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegisterUserWithValidData()
    {
        $playload = [
            'username' => 'test' . STR::random(10),
            'email' => STR::random(10) . '@gmail.com',
            'password' => 'test1234',
            'password_confirmation' => 'test1234'
        ];
        
        $response = $this->withHeaders([
            'Accept' => 'application/json'
        ])
        ->json('post', 'api/v2/register', $playload);
        
        //$response->dump();

        $response->assertStatus(500);
    }
}
