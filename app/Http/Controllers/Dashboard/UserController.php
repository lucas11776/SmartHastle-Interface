<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * Get all user account in storage.
     *
     * @return Factory|View
     */
    public function index()
    {
        $users = User::orderBy('create_at', 'DESC')
            ->paginate(20);

        return view('dashboard.user.users', ['users' => $users]);
    }

    /**
     * Display single user account.
     *
     * @param User $user
     * @return Factory|View
     */
    public function view(User $user)
    {
        return view('dashboard.user.single', ['user' => $user]);
    }

    /**
     * Get user orders.
     *
     * @param User $user
     * @return Factory|View
     */
    public function orders(User $user)
    {
        $orders = $user->orders()
            ->orderBy('created_at', 'DESC')
            ->paginate();

        return view('dashboard.user.orders', ['orders' => $orders]);
    }

    /**
     * Get user favorite products.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function favorites(User $user)
    {
        $favorites = $user->favorites()
            ->paginate(12);

        return view('dashboard.user.favorites', [
            'favorites' => $favorites,
            'user' => $user,
        ]);
    }
}
