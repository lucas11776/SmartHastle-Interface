<?php

namespace Tests\Feature\User;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class AddUserRoleTest extends TestCase
{
    /**
     * @var User
     */
    private $user;

    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loginAsAdministrator();

        $this->user = factory(User::class)->create();
    }

    /**
     * Should add user role.
     */
    public function testAddUserRole()
    {
        $data = ['role' => 'administrator'];

        $this->addRole($this->user->id, $data)
            ->assertRedirect();
        $this->assertNotNull(
            $this->user->roles()->where('name', $data['role'])->first()
        );
    }

    /**
     * Should try to existing role in user.
     */
    public function testAddExistingUserRole()
    {
        $data = ['role' => 'administrator'];

        $this->addRole(auth()->user()->id, $data)
            ->assertJsonStructure([
               'message',
               'errors' => [
                   'role'
               ]
            ]);
    }

    /**
     * Should try to update role with empty data.
     */
    public function testAddUserRoleWithEmptyData()
    {
        $this->addRole($this->user->id, [])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'role'
                ]
            ]);
    }

    /**
     * Should try to add invalid user role.
     */
    public function testAddUserRoleWithInvalidRole()
    {
        $data = ['role' => 'developer'];

        $this->addRole($this->user->id, $data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'role'
                ]
            ]);
    }

    /**
     * Make request to add use role.
     *
     * @param int $userId
     * @param array $data
     * @return TestResponse
     */
    protected function addRole(int $userId, array $data): TestResponse
    {
        return $this->json('POST', 'user/' . $userId . '/role', $data);
    }
}
