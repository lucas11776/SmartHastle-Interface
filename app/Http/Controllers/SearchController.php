<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Search for a product in database.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        $search = $request->get('q') ?? '';
        $products = $this->searchProductsQuery($search)
            ->paginate(12);

        return view('product.products', ['products' => $products]);
    }

    /**
     * Search products query.
     *
     * @param string $search
     * @return Builder
     */
    private function searchProductsQuery(string $search): Builder
    {
        return Product::query()
            ->where('name', 'LIKE', '%' . $search . '%')
            ->orWhere('brand', 'LIKE', '%' . $search . '%');

    }
}
