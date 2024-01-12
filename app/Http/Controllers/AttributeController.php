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
                'Retrieve Attribute List Successfully.',
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
                'Create Attribute Successfully.',
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
                'Retrieve Attribute Details Successfully.',
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
                'Update Attribute Details Successfully.',
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
                'Delete Attribute Successfully.',
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
                'Retrieve Attribute Value List Successfully.',
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
                'Create Attribute Value Successfully.',
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
                'Show Attribute Value Details Successfully.',
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
                'Update Attribute Value Details Successfully.',
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
                'Delete Attribute Value Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
