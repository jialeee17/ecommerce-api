<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use App\Enums\CommonStatusesEnum;
use Illuminate\Foundation\Http\FormRequest;

class UpsertCategoryRequest extends FormRequest
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
        $category = $this->category;

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            // Update Request (PUT / PATCH)
            $rules = [
                'name' => ['required', 'string'],
                'slug' => ['required', 'string', Rule::unique('categories', 'slug')->ignore($category)],
                'description' => ['nullable', 'string'],
                'image' => ['nullable', 'image'],
                'status' => ['required', Rule::enum(CommonStatusesEnum::class)],
                'parent_category_id' => ['nullable', 'integer', 'exists:categories,id']
            ];
        } else {
            // Insert Request (POST)
            $rules = [
                'name' => ['required', 'string'],
                'slug' => ['required', 'string', 'unique:categories,slug'],
                'description' => ['nullable', 'string'],
                'image' => ['nullable', 'image'],
                'status' => ['required', Rule::enum(CommonStatusesEnum::class)],
                'parent_category_id' => ['nullable', 'integer', 'exists:categories,id']
            ];
        }

        return $rules;
    }
}
