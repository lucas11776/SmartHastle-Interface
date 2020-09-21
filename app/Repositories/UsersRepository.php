<?php

namespace App\Repositories;

use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class UsersRepository implements UsersRepositoryInterface
{
    public function get(string $direction = 'DESC'): Builder
    {
        return User::query()->orderBy('created_at', $direction);
    }

    public function getByRole(string $role): BelongsToMany
    {
        return Role::query()->where('name', $role)->firstOrFail()->users();
    }
}
