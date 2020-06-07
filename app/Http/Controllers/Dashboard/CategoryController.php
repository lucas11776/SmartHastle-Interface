<?php

namespace App\Http\Controllers\Dashboard;

use App\Category;
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
        $categories = Category::all();

        return view('dashboard.category.categories', ['categories' => $categories]);
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
