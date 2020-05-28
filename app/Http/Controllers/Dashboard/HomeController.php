<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Dash board home page.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('dashboard.home');
    }
}
