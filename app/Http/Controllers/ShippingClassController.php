<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\ShippingClass;
use Illuminate\Validation\Rule;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Repositories\ShippingClassRepository;

class ShippingClassController extends Controller
{
    private $shippingClassRepository;

    public function __construct(ShippingClassRepository $shippingClassRepository)
    {
        $this->shippingClassRepository = $shippingClassRepository;
    }

    public function index()
    {
        try {
            $shippingClasses = $this->shippingClassRepository->getAllShippingClasses();

            return new ApiSuccessResponse(
                $shippingClasses,
                str_replace(':name', 'Shipping Classes', __('messages.retrieve.success')),
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
            $request->validate([
                'name' => ['required', 'string'],
                'slug' => ['required', 'string', 'unique:shipping_classes,slug'],
                'description' => ['nullable', 'string'],
            ]);

            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
            ];

            $shippingClass = $this->shippingClassRepository->createShippingClass($data);

            return new ApiSuccessResponse(
                $shippingClass,
                str_replace(':name', 'Shipping Class', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(ShippingClass $shippingClass)
    {
        try {
            return new ApiSuccessResponse(
                $shippingClass,
                str_replace(':name', 'Shipping Class', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, ShippingClass $shippingClass)
    {
        try {
            $request->validate([
                'name' => ['required', 'string'],
                'slug' => ['required', 'string', Rule::unique('shipping_classes', 'slug')->ignore($shippingClass)],
                'description' => ['nullable', 'string'],
            ]);

            $data = [
                'name' => $request->name,
                'slug' => $request->slug,
                'description' => $request->description,
            ];

            $data = $this->shippingClassRepository->updateShippingClass($shippingClass->id, $data);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Shipping Class', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(ShippingClass $shippingClass)
    {
        try {
            $this->shippingClassRepository->deleteShippingClass($shippingClass->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Shipping Class', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
