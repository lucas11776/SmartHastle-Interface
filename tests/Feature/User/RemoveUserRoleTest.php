<?php

namespace Tests\Feature\User;

use App\Role;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class RemoveUserRoleTest extends TestCase
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

        $adminRole = Role::where('name', 'administrator')
            ->first();

        $this->user = factory(User::class)
            ->create();

        $this->user->roles()
            ->attach($adminRole->id);

        $this->loginAsAdministrator();
    }

    /**
     * Should remove user role.
     */
    public function testRemoveUserRole()
    {
        $data = ['role' => 'administrator'];

        $this->removeUserRole($this->user->id, $data)
            ->assertRedirect();

        $this->assertNull(
            $this->user->roles()->where('name', $data['role'])->first()
        );
    }

    /**
     * Should try to delete user role with empty data.
     */
    public function testRemoveUserRoleWithEmptyData()
    {
        $this->removeUserRole($this->user->id, [])
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'role'
                ]
            ]);
    }

    public function testRemoveUserRoleNotContainedByUser()
    {
        $data = ['role' => 'staff'];

        $this->removeUserRole($this->user->id, $data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'role'
                ]
            ]);
    }

    /**
     * Should try to delete user role with empty data.
     */
    public function testRemoveUserRoleWithInvalidRoleName()
    {
        $data = ['role' => 'doctor'];

        $this->removeUserRole($this->user->id, $data)
            ->assertJsonStructure([
                'message',
                'errors' => [
                    'role'
                ]
            ]);
    }

    /**
     * Make request to remove a user role.
     *
     * @param int $userId
     * @param array $data
     * @return TestResponse
     */
    protected function removeUserRole(int $userId, array $data): TestResponse
    {
        return $this->json('DELETE', 'user/' . $userId . '/role', $data);
    }
}
