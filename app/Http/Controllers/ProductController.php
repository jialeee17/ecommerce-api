<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Product;
use App\Services\ProductService;
use App\Repositories\ProductRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Requests\StoreProductRequest;
use App\Http\Responses\ApiSuccessResponse;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    private $productRepository;
    private $productService;

    public function __construct(ProductRepository $productRepository, ProductService $productService)
    {
        $this->productRepository = $productRepository;
        $this->productService = $productService;
    }

    public function index()
    {
        try {
            $data = $this->productRepository->getAllProducts();

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Products', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function store(StoreProductRequest $request)
    {
        try {
            $data = $this->productService->storeProduct($request);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Product', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(Product $product)
    {
        try {
            return new ApiSuccessResponse(
                $product,
                str_replace(':name', 'Product', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        try {
            $data = $this->productService->updateProduct($request, $product);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Product', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(Product $product)
    {
        try {
            $this->productRepository->deleteProduct($product->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Product', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
