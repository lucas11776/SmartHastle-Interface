<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

interface UsersRepositoryInterface
{
    /**
     * Get users.
     *
     * @param string $orderDirection
     * @return Builder
     */
    public function get(string $orderDirection = 'DESC'): Builder;

    /**
     * Get users by role.
     *
     * @param string $role
     * @return BelongsToMany
     */
    public function getByRole(string $role): BelongsToMany;
}
