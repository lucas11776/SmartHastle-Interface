<?php

namespace App\Http\Controllers;

use App\Product;
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
        $products = Product::orderBy('id', 'DESC')->limit(6)->get();

        return view('home', ['products' => $products]);
    }

    /**
     * Get application products page.
     *
     * @return Factory|View
     */
    public function products()
    {
        $products = Product::orderBy('id', 'DESC')->paginate(6);

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
        $product = Product::where('slug', $slug)->firstOrFail();

        return view('product.single', ['product' => $product]);
    }
}
