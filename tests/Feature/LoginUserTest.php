<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

class LoginUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $user = factory(User::class)->create();
        
        $playload = [];
        
        $response = $this>actingAs($user)
        ->withHeaders([
            'Accept' => 'application/json'
        ])
        ->json('post', 'api/v2/login', $playload);
        
        $response->dump();
        
        $response->assertStatus(401);
        
        
    }
}
