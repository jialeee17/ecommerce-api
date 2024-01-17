<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use Illuminate\Validation\Rule;
use App\Enums\CommonStatusesEnum;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Repositories\ShippingAddressRepository;

class ShippingAddressController extends Controller
{
    private $shippingAddressRepository;

    public function __construct(ShippingAddressRepository $shippingAddressRepository)
    {
        $this->shippingAddressRepository = $shippingAddressRepository;
    }

    public function index()
    {
        try {
            $shippingAddresses = $this->shippingAddressRepository->getAllShippingAddresses();

            return new ApiSuccessResponse(
                $shippingAddresses,
                str_replace(':name', 'Shipping Addresses', __('messages.retrieve.success')),
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
                'customer_id' => ['required', 'integer', 'exists:customers,id'],
                'address_1' => ['required', 'string'],
                'address_2' => ['nullable', 'string'],
                'city' => ['required', 'string'],
                'state_id' => ['required', 'integer', 'exists:states,id'],
                'postcode' => ['required', 'string'],
                'country_id' => ['required', 'integer', 'exists:countries,id'],
                'status' => ['required', 'string', Rule::enum(CommonStatusesEnum::class)],
            ]);

            $data = [
                'customer_id' => $request->customer_id,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'city' => $request->city,
                'state_id' => $request->state_id,
                'postcode' => $request->postcode,
                'country_id' => $request->country_id,
                'status' => $request->status,
            ];

            $shippingAddress = $this->shippingAddressRepository->createShippingAddress($data);

            return new ApiSuccessResponse(
                $shippingAddress,
                str_replace(':name', 'Shipping Address', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(ShippingAddress $shippingAddress)
    {
        try {
            return new ApiSuccessResponse(
                $shippingAddress,
                str_replace(':name', 'Shipping Address', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, ShippingAddress $shippingAddress)
    {
        try {
            $request->validate([
                'address_1' => ['required', 'string'],
                'address_2' => ['nullable', 'string'],
                'city' => ['required', 'string'],
                'state_id' => ['required', 'integer', 'exists:states,id'],
                'postcode' => ['required', 'string'],
                'country_id' => ['required', 'integer', 'exists:countries,id'],
                'status' => ['required', 'string', Rule::enum(CommonStatusesEnum::class)],
            ]);

            $data = [
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'city' => $request->city,
                'state_id' => $request->state_id,
                'postcode' => $request->postcode,
                'country_id' => $request->country_id,
                'status' => $request->status,
            ];

            $data = $this->shippingAddressRepository->updateShippingAddress($shippingAddress->id, $data);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Shipping Address', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(ShippingAddress $shippingAddress)
    {
        try {
            $this->shippingAddressRepository->deleteShippingAddress($shippingAddress->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Shipping Address', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
