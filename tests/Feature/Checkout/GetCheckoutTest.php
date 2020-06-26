<?php

namespace Tests\Feature\Checkout;

use App\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class GetCheckoutTest extends TestCase
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

        factory(Cart::class)->times(rand(2,5))->create(['user_id' => auth()->user()->id]);
    }

    /**
     * Should get check out page.
     */
    public function testGetCheckoutPage()
    {
        $this->json('get', 'checkout')
            ->assertOk();
    }
}
