<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Support\Str;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class ProductRepository implements ProductRepositoryInterface
{
    public function upload(array $data, Collection $images): Product
    {
        $product = $this->create($data);

        $this->uploadImages($product, $images);

        return $product;
    }

    public function delete(Product $product): void
    {
        // :TODO add soft delete to products.
        $this->deleteImages($product);
        $product->images()->delete();
        $product->delete();
    }

    /**
     * Create product in storage.
     *
     * @param array $data
     * @return Product
     */
    protected function create(array $data): Product
    {
        return Product::create([
            'name' => $data['name'],
            'price' => $data['price'],
            'slug' => Str::slug($data['name']),
            'brand' => $data['brand'] ?? null,
            'description' => $data['description'],
            'category_id' => $data['category_id'],
            'discount' => $data['discount'] ?? null,
        ]);
    }

    /**
     * Upload products images/pictures.
     *
     * @param Product $product
     * @param Collection $images
     * @return Collection
     */
    protected function uploadImages(Product $product, Collection $images): Collection
    {
        return $images->sortKeysDesc()->map(function (UploadedFile $image) use ($product) {
            return $this->createImage($product, $image->store('public'));
        });
    }

    /**
     * Create product image in storage.
     *
     * @param Product $product
     * @param string $path
     * @return Model
     */
    protected function createImage(Product $product, string $path): Model
    {
        return $product->image()->create(['path' => $path, 'url' => url(Storage::url($path))]);
    }

    /**
     * Delete products images.
     *
     * @param Product $product
     */
    protected function deleteImages(Product $product): void
    {
        foreach ($product->images as $image) Storage::delete($image->path);
    }
}
