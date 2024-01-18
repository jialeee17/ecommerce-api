<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\ShippingMethod;
use Illuminate\Validation\Rule;
use App\Enums\CommonStatusesEnum;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Repositories\ShippingMethodRepository;

class ShippingMethodController extends Controller
{
    private $shippingMethodRepository;

    public function __construct(ShippingMethodRepository $shippingMethodRepository)
    {
        $this->shippingMethodRepository = $shippingMethodRepository;
    }

    public function index()
    {
        try {
            $shippingMethods = $this->shippingMethodRepository->getAllShippingMethods();

            return new ApiSuccessResponse(
                $shippingMethods,
                str_replace(':name', 'Shipping Methods', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(ShippingMethod $shippingMethod)
    {
        try {
            return new ApiSuccessResponse(
                $shippingMethod,
                str_replace(':name', 'Shipping Method', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, ShippingMethod $shippingMethod)
    {
        try {
            $request->validate([
                'description' => ['nullable', 'string'],
                'status' => ['required', 'string', Rule::enum(CommonStatusesEnum::class)],
            ]);

            $tag = $this->shippingMethodRepository->updateShippingMethod($shippingMethod->id, [
                'description' => $request->description,
                'status' => $request->status,
            ]);

            return new ApiSuccessResponse(
                $tag,
                str_replace(':name', 'Shipping Method', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(ShippingMethod $shippingMethod)
    {
        try {
            $this->shippingMethodRepository->deleteShippingMethod($shippingMethod->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Shipping Method', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
