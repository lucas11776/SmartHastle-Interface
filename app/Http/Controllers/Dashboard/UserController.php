<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Order;
use App\Role;
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
        $users = User::query()
            ->orderBy('create_at', 'DESC')
            ->paginate(20);

        return view('dashboard.user.users', ['users' => $users]);
    }

    /**
     * Get users by role.
     *
     * @param string $role
     * @return Application|Factory|View
     */
    public function byRole(string $role)
    {
        $users = Role::query()
            ->where('name', $role)
            ->firstOrFail()
            ->users()
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

        return view('dashboard.user.orders', [
            'orders' => $orders,
            'user' => $user
        ]);
    }

    /**
     * Get single user order.
     *
     * @param User $user
     * @param string $order
     * @return Application|Factory|View
     */
    public function singleOrder(User $user, string $order)
    {
        $order = $user->orders()->findOrFail($order);

        return view('dashboard.user.order', ['order' => $order]);
    }

    /**
     * Get user cart.
     *
     * @param User $user
     * @return Application|Factory|View
     */
    public function cart(User $user)
    {
        return view('dashboard.user.cart', ['user' => $user]);
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
