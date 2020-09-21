<?php

namespace App\Http\Controllers;

use App\Product;
use App\Http\Requests\ProductImage;
use App\Http\Requests\ProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Exception;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Store new product in storage.
     *
     * @param ProductRequest $productRequest
     * @param ProductImage $imageRequest
     * @return RedirectResponse|Redirector
     */
    public function store(ProductRequest $productRequest, ProductImage $imageRequest)
    {
        $data = $productRequest->validated();
        $images = collect($imageRequest->files->get('image'));
        $product = $this->productRepository->upload($data, $images);

        return redirect("dashboard/products/{$product->id}")->with('success', 'Product has been added to store.');
    }

    /**
     * Update specified product in storage.
     *
     * @param Product $product
     * @param ProductRequest $request
     * @return RedirectResponse|Redirector
     */
    public function update(Product $product, ProductRequest $request)
    {
        $product->update($request->validated());

        return redirect()->back()->with('info', 'Product has been updated successfully.');
    }

    /**
     * Delete specified product in storage.
     *
     * @param Product $product
     * @return RedirectResponse|Redirector
     * @throws Exception
     */
    public function destroy(Product $product)
    {
        $this->productRepository->delete($product);

        return redirect('dashboard/products')->with('success', 'Product has been delete successfully.');
    }
}
