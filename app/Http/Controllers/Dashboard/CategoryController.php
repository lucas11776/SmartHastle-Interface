<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Get all categories in storage.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('dashboard.category.categories');
    }

    /**
     * Create category view form.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('dashboard.category.create');
    }
}
