<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
   public function createCategory(array $data): Category
   {
       return Category::create($data);
   }

   public function updateCategory(Category $category, array $data): Category
   {
       $category->update($data);

       return $category->fresh();
   }

   public function deleteCategory(Category $category): bool
   {
       return $category->delete();
   }

   public function getCategories(array $filters = [])
   {
       $query = Category::query();

       if (!empty($filters['search'])) {
           $query->where('name', 'like', '%' . $filters['search'] . '%');
       }

       return $query->paginate(20);
   }
}
