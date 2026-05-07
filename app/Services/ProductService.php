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

    public function deleteProduct(Product $product): bool
    {
        return $product->delete();
    }

    protected function generateSku(array $data): string
    {
        return strtoupper(substr($data['product_name'], 0, 3)) . '-' . time();
    }

    public function getProducts(array $filters = [])
    {
        $query = Product::query();

        if (!empty($filters['search'])) {
            $query->where('product_name', 'like', '%' . $filters['search'] . '%');
        }

        if (!empty($filters['category_id'])) {
            $query->where('category_id', $filters['category_id']);
        }

        return $query->paginate(20);
    }
}
