<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreCategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
   
    public function __construct(
        protected CategoryService $categoryService
    ) {}

    public function index(Request $request)
    {
        return response()->json(
            $this->categoryService->getCategories(
                $request->only('search')
            )
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        return response()->json(
            $this->categoryService->createCategory(
                $request->validated()
            )
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json(
            $this->categoryService->getCategory($id)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        return response()->json(
            $this->categoryService->updateCategory($id, $request->validated())
        );
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return response()->json([
            'success' => $this->categoryService->deleteCategory($id)
        ]);
    }
}
