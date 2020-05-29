<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
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
        return view('dashboard.user.users');
    }


}
