<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Support\Collection;

interface ProductRepositoryInterface
{
    public function upload(array $data, Collection $images): Product;

    public function delete(Product $product): void;
}
