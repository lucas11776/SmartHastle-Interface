<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\Repositories\UsersRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\View\View;

class UserController extends Controller
{
    /**
     * @var UsersRepository
     */
    protected $usersRepository;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * UserController constructor.
     *
     * @param UsersRepository $usersRepository
     * @param UserRepository $userRepository
     */
    public function __construct(UsersRepository $usersRepository, UserRepository $userRepository)
    {
        $this->usersRepository = $usersRepository;
        $this->userRepository = $userRepository;
    }

    /**
     * Get all user account in storage.
     *
     * @return Factory|View
     */
    public function index()
    {
        $users = $this->usersRepository->get()->paginate(20);

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
        $users = $this->usersRepository->getByRole($role)->paginate(20);

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
        $orders = $this->userRepository->orders($user)->paginate(12);

        return view('dashboard.user.orders', ['user' => $user, 'orders' => $orders]);
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
        $favorites = $this->userRepository->favorites($user)->paginate(12);

        return view('dashboard.user.favorites', ['user' => $user, 'favorites' => $favorites]);
    }
}
