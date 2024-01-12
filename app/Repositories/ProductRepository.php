<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public function getAllProducts()
    {
        return Product::all();
    }

    public function createProduct(array $data)
    {
        return Product::create($data);
    }

    public function updateProduct($id, array $data)
    {
        return Product::findOrFail($id)->update($data);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);

        return $product->delete();
    }
}
