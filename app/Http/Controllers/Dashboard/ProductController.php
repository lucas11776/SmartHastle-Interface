<?php

namespace App\Http\Controllers\Dashboard;

use App\Product;
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
        $products = Product::paginate(16);

        return view('dashboard.product.products', ['products' => $products]);
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

    /**
     * Edit product form view.
     *
     * @param Product $product
     * @return Factory|View
     */
    public function edit(Product $product)
    {
        return view('dashboard.product.edit', ['product' => $product]);
    }
}
