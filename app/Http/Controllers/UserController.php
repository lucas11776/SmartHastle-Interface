<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\RoleExistsRequest;
use App\Http\Requests\RoleNotExistsRequest;
use App\Http\Requests\RoleRequest;
use App\Http\Requests\UserRequest;
use App\Http\Requests\ProfilePictureRequest;
use App\Repositories\UserRepository;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Get user account settings page.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function index(Request $request)
    {
        return view('user.account', ['user' => $request->user()]);
    }

    /**
     * Get user favorite products.
     *
     * @param Request $request
     * @return Factory|View
     */
    public function favorites(Request $request)
    {
        $user = $request->user();
        $userFavorites = $this->userRepository->favorites($user)->paginate(12);

        return view('user.favorites', ['user' => $user, 'favorites' => $userFavorites]);
    }

    /**
     * Get change user password view.
     *
     * @return Factory|View
     */
    public function changePasswordView()
    {
        return view('user.change_password');
    }

    /**
     * Change user password.
     *
     * @param Request $request
     * @param ChangePasswordRequest $changePasswordRequest
     * @return RedirectResponse
     */
    public function changePassword(Request $request, ChangePasswordRequest $changePasswordRequest)
    {
        $user = $request->user();
        $password = $changePasswordRequest->get('password');

        $this->userRepository->changePassword($user, $password);

        return redirect()->back()->with('info', 'Your password has been changed successfully.');
    }

    /**
     * Update user account details.
     *
     * @param Request $request
     * @param UserRequest $userRequest
     * @return RedirectResponse
     */
    public function update(Request $request, UserRequest $userRequest)
    {
        $this->userRepository->update($request->user(), $userRequest->validated());

        return redirect()->back()->with('success', 'Personal details updated successfully.');
    }

    /**
     * Upload new user profile picture.
     *
     * @param Request $request
     * @param ProfilePictureRequest $profilePictureRequest
     *
     * @return RedirectResponse
     */
    public function uploadProfilePicture(Request $request, ProfilePictureRequest $profilePictureRequest)
    {
        $this->userRepository->changeProfilePicture($request->user(), $profilePictureRequest->file('image'));

        return redirect()->back()->with('success', 'Profile picture has been change successfully');
    }

    /**
     * Add user role.
     *
     * @param User $user
     * @param RoleNotExistsRequest $roleNotExistsRequest
     * @return RedirectResponse
     */
    public function addRole(User $user, RoleNotExistsRequest $roleNotExistsRequest)
    {
        $this->userRepository->addRole($user, $roleNotExistsRequest->get('role'));

        return redirect()->back()->with('success', 'Use role has been added successfully.');
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
        $this->userRepository->removeRole($user, $roleExistsRequest->get('role'));

        return redirect()->back()->with('success', 'User role has been removed successfully.');
    }
}
