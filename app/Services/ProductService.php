<?php

namespace App\Services;

use App\Models\Product;
use Exception;
use App\Models\Tag;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Repositories\ProductRepository;
use Aws\ForecastService\Exception\ForecastServiceException;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function storeProduct(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'sku' => $request->sku,
                'description' => $request->description,
                'type' => $request->type,
                'regular_price' => $request->regular_price,
                'sale_price' => $request->sale_price,
                'weight' => $request->weight,
                'length' => $request->length,
                'width' => $request->width,
                'height' => $request->height,
                'quantity' => $request->quantity,
                'category_id' => $request->category_id,
                'status' => $request->status,
                'is_featured' => $request->is_featured,
            ];

            if ($request->hasFile('product_image')) {
                $path = $request->file('product_image')->store('products');
                $data['product_image'] = $path;
            }

            if ($images = $request->file('product_gallery_images')) {
                $imagePaths = [];

                foreach ($images as $image) {
                    $path = Storage::put('products', $image);
                    $imagePaths[] = $path;
                }

                $data['gallery_image_paths'] = $imagePaths;
            }

            $product = $this->productRepository->createProduct($data);

            if ($tags = $request->tags) {
                foreach ($tags as $tag) {
                    $tag = Tag::firstOrCreate(
                        ['name' => $tag],
                        ['slug' => Str::replace(' ', '-', strtolower($tag))]
                    );
                    $product->tags()->attach($tag->id);
                }
            }

            // TODO: Product Variations

            DB::commit();

            return $product->load('tags');
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }

    public function updateProduct(Request $request, Product $product)
    {
        DB::beginTransaction();

        try {
            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'sku' => $request->sku,
                'description' => $request->description,
                'regular_price' => $request->regular_price,
                'sale_price' => $request->sale_price,
                'quantity' => $request->quantity,
                'category_id' => $request->category_id,
                'status' => $request->status,
                'is_featured' => $request->is_featured,
            ];


            if ($request->hasFile('product_image')) {
                if ($path = $product->image_path) {
                    Storage::delete($path);
                }

                $path = $request->file('product_image')->store('products');

                $data['image_path'] = $path;
            }

            if ($images = $request->file('product_gallery_images')) {
                if ($paths = $product->gallery_image_paths) {
                    foreach ($paths as $path) {
                        Storage::delete($path);
                    }
                }

                $imagePaths = [];

                foreach ($images as $image) {
                    $path = Storage::put('products', $image);

                    $imagePaths[] = $path;
                }

                $data['gallery_image_paths'] = $imagePaths;
            }

            $this->productRepository->updateProduct($product->id, $data);

            if ($tags = $request->tags) {
                $syncIds = [];

                foreach ($tags as $tag) {
                    $tag = Tag::firstOrCreate(
                        ['name' => $tag],
                        ['slug' => Str::replace(' ', '-', strtolower($tag))]
                    );

                    $syncIds[] = $tag->id;
                }

                $product->tags()->sync($syncIds);
            }

            DB::commit();

            return $product->load('tags');
        } catch (Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}
