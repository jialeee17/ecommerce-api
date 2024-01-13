<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Models\AttributeValue;
use Illuminate\Validation\Rule;
use App\Http\Responses\ApiErrorResponse;
use App\Repositories\AttributeRepository;
use App\Http\Responses\ApiSuccessResponse;

class AttributeController extends Controller
{
    private $attributeRepository;

    public function __construct(AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
    }

    /* -------------------------------------------------------------------------- */
    /*                                 Attributes                                 */
    /* -------------------------------------------------------------------------- */
    public function index()
    {
        try {
            $attributes = $this->attributeRepository->getAllAttributes();

            return new ApiSuccessResponse(
                $attributes,
                str_replace(':name', 'Attributes', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string'],
                'slug' => ['required', 'string', 'unique:attributes,slug'],
            ]);

            $attribute = $this->attributeRepository->createAttribute($data);

            return new ApiSuccessResponse(
                $attribute,
                str_replace(':name', 'Attribute', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(Attribute $attribute)
    {
        try {
            return new ApiSuccessResponse(
                $attribute,
                str_replace(':name', 'Attribute', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, Attribute $attribute)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string'],
                'slug' => ['required', 'string', Rule::unique('attributes', 'slug')->ignore($attribute)]
            ]);

            $attribute = $this->attributeRepository->updateAttribute($attribute->id, $data);

            return new ApiSuccessResponse(
                $attribute,
                str_replace(':name', 'Attribute', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(Attribute $attribute)
    {
        try {
            $this->attributeRepository->deleteAttribute($attribute->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Attribute', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    /* -------------------------------------------------------------------------- */
    /*                              Attribute Values                              */
    /* -------------------------------------------------------------------------- */
    public function indexAttributeValue()
    {
        try {
            $attributes = $this->attributeRepository->getAllAttributeValues();

            return new ApiSuccessResponse(
                $attributes,
                str_replace(':name', 'Attribute Values', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function storeAttributeValue(Request $request, Attribute $attribute)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string'],
                'slug' => ['required', 'string', 'unique:attribute_values,slug'],
                'description' => ['nullable', 'string'],
            ]);

            $data['attribute_id'] = $attribute->id;

            $attributeValue = $this->attributeRepository->createAttributeValue($data);

            return new ApiSuccessResponse(
                $attributeValue,
                str_replace(':name', 'Attribute Value', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function showAttributeValue(Attribute $attribute, AttributeValue $attributeValue)
    {
        try {
            return new ApiSuccessResponse(
                $attributeValue,
                str_replace(':name', 'Attribute Value', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function updateAttributeValue(Request $request, Attribute $attribute, AttributeValue $attributeValue)
    {
        try {
            $data = $request->validate([
                'name' => ['required', 'string'],
                'slug' => ['required', 'string', Rule::unique('attribute_values', 'slug')->ignore($attributeValue)],
                'description' => ['nullable', 'string'],
            ]);

            $data['attribute_id'] = $attribute->id;

            $attributeValue = $this->attributeRepository->updateAttributeValue($attributeValue->id, $data);

            return new ApiSuccessResponse(
                $attributeValue,
                str_replace(':name', 'Attribute Value', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroyAttributeValue(Attribute $attribute, AttributeValue $attributeValue)
    {
        try {
            $this->attributeRepository->deleteAttributeValue($attributeValue->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Attribute Value', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
