<?php

namespace Tests\Mocks;

use App\Role;
use App\User;
use Faker\Factory as Faker;

trait AuthenticationMocks
{
    /**
     * Login user.
     */
    public function loginAsUser()
    {
        auth()->login(factory(User::class)->create());
    }

    /**
     * Login user as staff member
     */
    public function loginAsStaff()
    {
        $role = Role::where('name', 'staff')->first();

        auth()->login(factory(User::class)->create());

        auth()->user()->roles()->attach($role->id);
    }

    /**
     * Login user as administrator.
     */
    public function loginAsAdministrator()
    {
        $role = Role::where('name', 'administrator')->first();

        auth()->login(factory(User::class)->create());

        auth()->user()->roles()->attach($role->id);
    }

    /**
     * Register mock data.
     *
     * @return array
     */
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

    /**
     * Login mock data.
     *
     * @return array
     */
    public function LoginMock(): array
    {
        return [
            'email' => factory(User::class)->create()->email,
            'password' => 'password'
        ];
    }
}
