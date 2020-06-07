<?php

namespace App\Http\Controllers;

use App\Http\Requests\RoleExistsRequest;
use App\Http\Requests\RoleNotExistsRequest;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ProfilePictureRequest;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Get user account settings page.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('user.account', ['user' => auth()->user()]);
    }

    /**
     * Get user favorite items.
     *
     * @return Factory|View
     */
    public function favorites()
    {
        return view('user.favorites');
    }

    /**
     * Get change user password page.
     *
     * @return Factory|View
     */
    public function changePassword()
    {
        return view('user.change_password');
    }

    /**
     * Update user account details.
     *
     * @param UserRequest $userRequest
     * @return RedirectResponse
     */
    public function update(UserRequest $userRequest)
    {
        $this->updateUserAccount($userRequest->validated());

        return redirect()->back();
    }

    /**
     * Upload new user profile picture.
     *
     * @param ProfilePictureRequest $profilePictureRequest
     * @return RedirectResponse
     */
    public function uploadProfilePicture(ProfilePictureRequest $profilePictureRequest)
    {
        $image = $profilePictureRequest->validated()['image'];
        $path = Storage::put('public', $image);

        $this->changeProfilePicture($path);

        return redirect()->back();
    }

    /**
     * Add user role.
     *
     * @param User $user
     * @param RoleNotExistsRequest $roleNotExistsRequest
     * @return RedirectResponse
     */
    public function addRole(User $user, RoleNotExistsRequest $roleNotExistsRequest) {
        $role = Role::where('name', $roleNotExistsRequest->validated()['role'])->first();

        $user->roles()->attach($role->id);

        return redirect()->back();
    }

    /**
     * Remove user role.
     *
     * @param User $user
     * @param RoleExistsRequest $roleExistsRequest
     * @return RedirectResponse
     */
    public function removeRole(User $user, RoleExistsRequest $roleExistsRequest)
    {
        $role = $roleExistsRequest->validated()['role'];

        $user->roles()
            ->where('name', $role)
            ->first()
            ->pivot->delete();

        return redirect()->back();
    }

    /**
     * Change user profile picture.
     *
     * @param string $path
     * @return bool
     */
    protected function changeProfilePicture(string $path): bool
    {
        $user = auth()->user();

        Storage::delete($user->image->path);

        return $user->image()->update([
            'path' =>  $path,
            'url' => url(Storage::url($path))
        ]);
    }

    /**
     * @param array $data
     * @return mixed
     */
    protected function updateUserAccount(array $data): bool
    {
        return auth()->user()->update([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'cellphone_number' => $data['cellphone_number'] ?? null,
        ]);
    }
}
