<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductImage;
use App\Product;
use App\Http\Requests\ProductRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Store new product in storage.
     *
     * @param ProductImage $image
     * @param ProductRequest $request
     * @return RedirectResponse|Redirector
     */
    public function store(ProductRequest $request, ProductImage $image)
    {
        $image = $this->upload($image->allFiles());
        $product = $this->create($request->validated());

        $this->createImage($product, $image);

        return redirect('dashboard/products');
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

        return redirect('dashboard/products');
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

        return redirect('dashboard/products');
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
     * Create new product in storage.
     *
     * @param array $data
     * @return Product
     */
    protected function create(array $data): Product
    {
        return Product::create([
            'category_id' => $data['category_id'],
            'slug' => Str::slug($data['name']),
            'name' => $data['name'],
            'brand' => $data['brand'] ?? null,
            'price' => $data['price'],
            'discount' => $data['discount'] ?? null,
            'description' => $data['description']

        ]);
    }

    /**
     * Upload product images.
     *
     * @param array $images
     * @return Collection
     */
    protected function upload(array $images): Collection
    {
        return collect($images)->map(function(UploadedFile $image) {
            return [
                'path' => $path = $image->store('public'),
                'url' => url($path)
            ];
        });
    }

    /**
     * Store product images in storage.
     *
     * @param Product $product
     * @param Collection $images
     * @return Collection
     */
    protected function createImage(Product $product, Collection $images): Collection
    {
        return collect($images)->map(function (array $image) use ($product) {
            return $product->image()->create($image);
        });
    }
}
