<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Responses\ApiErrorResponse;
use App\Repositories\CategoryRepository;
use App\Http\Responses\ApiSuccessResponse;
use App\Http\Requests\UpsertCategoryRequest;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        try {
            $categories = $this->categoryRepository->getAllCategories();

            return new ApiSuccessResponse(
                $categories,
                str_replace(':name', 'Categories', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function store(UpsertCategoryRequest $request)
    {
        try {
            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'status' => $request->status,
                'parent_category_id' => $request->parent_category_id,
            ];

            if ($request->hasFile('image')) {
                $path = $request->file('image')->store('categories');

                $data['image_path'] = $path;
            }

            $category = $this->categoryRepository->createCategory($data);

            return new ApiSuccessResponse(
                $category,
                str_replace(':name', 'Category', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(Category $category)
    {
        try {
            return new ApiSuccessResponse(
                $category,
                str_replace(':name', 'Category', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(UpsertCategoryRequest $request, Category $category)
    {
        try {
            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
                'status' => $request->status,
                'parent_category_id' => $request->parent_category_id
            ];

            if ($request->hasFile('image')) {
                if ($path = $category->image_path) {
                    Storage::delete($path);
                }

                $path = $request->file('image')->store('categories');

                $data['image_path'] = $path;
            }

            $data = $this->categoryRepository->updateCategory($category->id, $data);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Category', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(Category $category)
    {
        try {
            $this->categoryRepository->deleteCategory($category->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Category', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
