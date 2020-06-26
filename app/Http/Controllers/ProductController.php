<?php

namespace App\Http\Controllers;

use Exception;
use App\Product;
use App\Http\Requests\ProductImage;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Collection;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Store new product in storage.
     *
     * @param ProductRequest $productRequest
     * @param ProductImage $imageRequest
     * @return RedirectResponse|Redirector
     */
    public function store(ProductRequest $productRequest, ProductImage $imageRequest)
    {
        $product = $this->create($productRequest->validated());
        $images = collect($imageRequest->validated()['image'])->sortKeysDesc();

        $this->uploadImages($product, $images->toArray());

        return redirect('dashboard/products/' . $product->id)
            ->with('success', 'Product has been added to store.');
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

        return redirect()
            ->back()
            ->with('info', 'Product has been updated successfully.');
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
        $this->deleteImage($product);
        $product->images()->delete();
        $product->delete();

        return redirect('dashboard/products')
            ->with('success', 'Product has been delete successfully.');
    }

    /**
     * Create new product in storage.
     *
     * @param array $data
     * @return Product
     */
    public function create(array $data): Product
    {
        return Product::create([
            'category_id' => $data['category_id'],
            'slug' => Str::slug($data['name']),
            'name' => $data['name'],
            'brand' => $data['brand'] ?? null,
            'price' => $data['price'],
            'discount' => $data['discount'] ?? null,
            'description' => $data['description'],

        ]);
    }

    /**
     * Delete product images.
     *
     * @param Product $product
     */
    protected function deleteImage(Product $product)
    {
        foreach ($product->images as $image) {
            Storage::delete($image->path);
        }
    }

    /**
     * Upload product images.
     *
     * @param Product $product
     * @param array $images
     * @return Collection
     */
    protected function uploadImages(Product $product, array $images): Collection
    {
        return collect($images)->map(function (UploadedFile $image) use ($product) {
            return $product->image()->create([
                'path' => $imagePath = $image->store('public'),
                'url' => url(Storage::url($imagePath))
            ]);
        });
    }
}
