<?php

namespace Tests\Mocks;

use App\User;
use Faker\Factory as Faker;

trait AuthenticationMocks
{
    public function loginAsUser()
    {
        auth()->login(factory(User::class)->create());
    }

    public function RegisterMock(): array
    {
        return [
            'first_name' => ($faker = Faker::create())->firstName,
            'last_name' => $faker->lastName,
            'email' => $faker->unique()->email,
            'password' => $password = $faker->password(8, 20),
            'password_confirmation' => $password
        ];
    }

    public function LoginMock(): array
    {
        return [
            'email' => factory(User::class)->create()->email,
            'password' => 'password'
        ];
    }
}
