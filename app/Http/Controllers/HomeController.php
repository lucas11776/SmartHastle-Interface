<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;

class HomeController extends Controller
{
    /**
     * Get home page.
     *
     * @return Factory|View
     */
    public function index()
    {
        $products = Product::query()
            ->orderBy('id', 'DESC')
            ->limit(6)->get();

        return view('home', ['products' => $products]);
    }

    /**
     * Get application products page.
     *
     * @return Factory|View
     */
    public function products()
    {
        $products = Product::query()
            ->orderBy('id', 'DESC')
            ->paginate(6);

        return view('product.products', ['products' => $products]);
    }

    /**
     * Get products by category slug.
     *
     * @param string $slug
     * @return Application|Factory|View
     */
    public function category(string $slug)
    {
        $products = Category::query()
            ->orderBy('id', 'DESC')
            ->where('slug', $slug)
            ->firstOrFail()
            ->categorizables()
            ->orderBy('id', 'DESC')
            ->paginate(8);

        return view('product.products', ['products' => $products]);
    }

    /**
     * Get single product view page.
     *
     * @param string $slug
     * @return Factory|View
     */
    public function product(string $slug)
    {
        $product = Product::query()
            ->orderBy('id', 'DESC')
            ->where('slug', $slug)
            ->firstOrFail();

        return view('product.single', ['product' => $product]);
    }
}
