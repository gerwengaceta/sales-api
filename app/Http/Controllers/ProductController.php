<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\Product\UpdateProductRequest;

class ProductController extends Controller
{
    public function __construct(
        protected ProductService $productService
    ) {}

    public function index(Request $request)
    {
        return response()->json(
            $this->productService->getProducts(
                $request->only(['search', 'category_id'])
            )
        );
    }

    public function store(StoreProductRequest $request)
    {
        return response()->json(
            $this->productService->createProduct(
                $request->validated()
            )
        );
    }

    public function show(Product $product)
    {
        return response()->json(
            $this->productService->getProductDetails($product)
        );
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        return response()->json(
            $this->productService->updateProduct(
                $product,
                $request->validated()
            )
        );
    }

    public function destroy(Product $product)
    {
        return response()->json([
            'success' => $this->productService->deleteProduct($product)
        ]);
    }
}
