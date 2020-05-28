<?php

namespace Tests\Feature\Product;

use App\Product;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;
use Illuminate\Foundation\Testing\TestResponse;

class DeleteProductTest extends TestCase
{
    /**
     * Should delete a product in storage.
     */
    public function testDeleteProduct()
    {
        $product = factory(Product::class)->create();
        $images = $product->images;

        $this->deleteProduct($product->id)
            ->assertRedirect();

        foreach ($images as $image) {
            Storage::assertMissing($image->path);
        }
    }

    /**
     * Make request to delete product.
     *
     * @param int $id
     * @return TestResponse
     */
    protected function deleteProduct(int $id): TestResponse
    {
        return $this->json('DELETE', 'product/' . $id);
    }
}
