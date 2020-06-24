<?php

namespace App;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Role extends Model
{
    /**
     * Application roles.
     *
     * @var array
     */
    public const ROLES = [
        'administrator', 'staff'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * Get all user that are staff members in database.
     *
     * @return Collection
     */
    public static function staff()
    {
        return Role::getRole('staff')->users;
    }

    /**
     * Get all user that are administrators in database.
     *
     * @return Collection
     */
    public static function administrators()
    {
        return Role::getRole('administrator')->users;
    }

    /**
     * Get all user belonging to this role.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany('App\User', 'users_roles');
    }

    /**
     * Get role model.
     *
     * @param string $role
     * @return Builder|Role
     */
    private static function getRole(string $role)
    {
        return Role::query()
            ->where('name', $role)
            ->firstOrFail();
    }
}
