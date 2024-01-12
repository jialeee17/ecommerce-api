<?php

namespace App\Http\Requests;

use App\Enums\ProductTypesEnum;
use Illuminate\Validation\Rule;
use App\Enums\ProductStatusesEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $product = $this->product;

        return [
            'name' => ['required', 'string'],
            'slug' => ['required', 'string', Rule::unique('products', 'slug')->ignore($product)],
            'sku' => ['required', 'string', Rule::unique('products', 'sku')->ignore($product)],
            'description' => ['nullable', 'string'],
            'type' => ['required', Rule::enum(ProductTypesEnum::class)],
            'regular_price' => ['required', 'decimal:0,2'],
            'sale_price' => ['nullable', 'decimal:0,2'],
            'weight' => ['nullable', 'string'],
            'length' => ['nullable', 'string'],
            'width' => ['nullable', 'string'],
            'height' => ['nullable', 'string'],
            'product_image' => ['nullable', 'image'],
            'product_gallery_images' => ['nullable', 'array'],
            'product_gallery_images.*' => ['image'],
            'quantity' => ['nullable', 'integer'],
            'category_id' => ['nullable', 'exists:categories,id'],
            'status' => ['required', Rule::enum(ProductStatusesEnum::class)],
            'is_featured' => ['required', 'boolean'],

            // Product Tags
            'tags' => ['nullable', 'array'],

            // Product Variations
            'variations' => ['array', Rule::requiredIf($this->type === ProductTypesEnum::VARIABLE->value)],
            'variations.*.attribute_combination' => ['array'],
            // 'variations.*.sku' => ['nullable', 'unique:products,slug', 'unique:product_variation,slug'],
            'variations.*.description' => ['nullable', 'string'],
            'variations.*.regular_price' => ['nullable', 'decimal:0,2'],
            'variations.*.sale_price' => ['nullable', 'decimal:0,2'],
            'variations.*.weight' => ['nullable', 'string'],
            'variations.*.length' => ['nullable', 'string'],
            'variations.*.width' => ['nullable', 'string'],
            'variations.*.height' => ['nullable', 'string'],
            'variations.*.product_image' => ['nullable', 'image'],
            'variations.*.quantity' => ['nullable', 'integer'],
        ];
    }
}
