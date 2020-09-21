<?php

namespace App\Repositories;

use App\Cart;
use App\Role;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserRepository implements UserRepositoryInterface
{
    public function cart(User $user): HasMany
    {
        return $user->cart()->orderBy('date', 'DESC');
    }

    public function addToCart(User $user, Model $model, string $size = null): Cart
    {
        return $user->cart()->create([
            'cartable_id' => $model->id,
            'cartable_type' => get_class($model),
            'size' => $data['size'] ?? null
        ]);
    }

    public function clearCart(User $user): bool
    {
        return $user->cart()->delete();
    }

    public function updateCart(User $user, Cart $cart, string $size = null): bool
    {
        return $user->cart()->findOrFail($cart->id)->update(['size' => $size]);
    }

    public function removeCart(User $user, Cart $cart): bool
    {
        return $user->cart()->findOrFail($cart->id)->delete();
    }

    public function favorites(User $user): HasMany
    {
        return $user->favorites()->orderBy('date', 'DESC');
    }

    public function orders(User $user): HasMany
    {
        return $user->orders()->orderBy('date', 'DESC');
    }

    public function update(User $user, array $attributes): bool
    {
        return $user->update($this->updateAttributes($attributes));
    }

    public function changeProfilePicture(User $user, UploadedFile $image): bool
    {
        $path = $this->uploadProfilePicture($image);

        Storage::delete($user->image->path);

        return $user->image()->update(['path' => $path, 'url' => url(Storage::url($path))]);
    }

    public function changePassword(User $user, string $newPassword): bool
    {
        $encryptedPassword = Hash::make($newPassword);

        return $user->update(['password' => $encryptedPassword]);
    }

    public function addRole(User $user, string $role): void
    {
        $role = Role::query()->where('name', $role)->firstOrFail();

        $user->roles()->attach($role->id);
    }

    public function removeRole(User $user, string $role): bool
    {
        $role = $user->roles()->where('name', $role)->firstOrFail();

        return $role->pivot->delete();
    }

    /**
     * Get user data form array.
     *
     * @param array $attributes
     * @return array
     */
    protected function updateAttributes(array $attributes): array
    {
        return [
            'first_name' => $attributes['first_name'],
            'last_name' => $attributes['last_name'],
            'cellphone_number' => $attributes['cellphone_number'] ?? null
        ];
    }

    /**
     * Upload profile picture.
     *
     * @param UploadedFile $image
     * @return string
     */
    protected function uploadProfilePicture(UploadedFile $image): string
    {
        return Storage::put('public', $image);
    }
}
