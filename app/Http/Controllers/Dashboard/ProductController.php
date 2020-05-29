<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\Factory;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Get all products in storage.
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('dashboard.product.products');
    }

    /**
     * Create product form view.
     *
     * @return Factory|View
     */
    public function create()
    {
        return view('dashboard.product.create');
    }
}
