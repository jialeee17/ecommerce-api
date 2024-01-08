<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function getAllCategories()
    {
        return Category::all();
    }

    public function createCategory(array $data)
    {
        return Category::create($data);
    }

    public function updateCategory($id, array $data)
    {
        return Category::findOrFail($id)->update($data);
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

        return $category->delete();
    }
}
