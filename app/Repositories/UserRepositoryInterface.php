<?php

namespace App\Repositories;

use App\Cart;
use App\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

interface UserRepositoryInterface
{
    /**
     * Get user cart.
     *
     * @param User $user
     * @return HasMany
     */
    public function cart(User $user): HasMany;

    /**
     * Add item to cart.
     *
     * @param User $user
     * @param Model $model
     * @return Cart
     */
    public function addToCart(User $user, Model $model): Cart;

    /**
     * Delete item in user cart.
     *
     * @param User $user
     * @param Cart $cart
     * @return bool
     */
    public function removeCart(User $user, Cart $cart): bool;

    /**
     * Clear user cart.
     *
     * @param User $user
     * @return bool
     */
    public function clearCart(User $user): bool;

    /**
     * Update user cart item.
     *
     * @param User $user
     * @param Cart $cart
     * @param string|null $size
     * @return bool
     */
    public function updateCart(User $user, Cart $cart, string $size = null): bool;

    /**
     * Get user favorites items.
     *
     * @param User $user
     * @return HasMany
     */
    public function favorites(User $user): HasMany;

    /**
     * Get user orders.
     *
     * @param User $user
     * @return HasMany
     */
    public function orders(User $user): HasMany;

    /**
     * Update user account.
     *
     * @param User $user
     * @param array $attributes
     * @return bool
     */
    public function update(User $user, array $attributes): bool;

    /**
     * Change user profile picture.
     *
     * @param User $user
     * @param UploadedFile $uploadedFile
     * @return bool
     */
    public function changeProfilePicture(User $user, UploadedFile $uploadedFile): bool;

    /**
     * Change user password.
     *
     * @param User $user
     * @param string $newPassword
     * @return bool
     */
    public function changePassword(User $user, string $newPassword): bool;

    /**
     * Add user role.
     *
     * @param User $user
     * @param string $role
     * @return mixed
     */
    public function addRole(User $user, string $role): void;

    /**
     * Remove user role.
     *
     * @param User $user
     * @param string $role
     * @return mixed
     */
    public function removeRole(User $user, string  $role): bool;
}
