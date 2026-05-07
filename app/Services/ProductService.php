<?php

namespace App\Services;

use App\Models\Product;

class ProductService
{
    public function createProduct(array $data): Product
    {
       $data['sku'] = !empty($data['sku'])
        ? strtoupper($data['sku'])
        : $this->generateSku($data);

        return Product::create($data);
    }

    public function updateProduct(Product $product, array $data): Product
    {
        $product->update($data);

        return $product->fresh();
    }

    protected function generateSku(array $data): string
    {
        return strtoupper(substr($data['product_name'], 0, 3)) . '-' . time();
    }
}
