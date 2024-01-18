<?php

namespace App\Http\Controllers;

use App\Enums\AddressTypesEnum;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Enums\CommonStatusesEnum;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;
use App\Models\Address;
use App\Repositories\AddressRepository;

class AddressController extends Controller
{
    private $addressRepository;

    public function __construct(AddressRepository $addressRepository)
    {
        $this->addressRepository = $addressRepository;
    }

    public function index()
    {
        try {
            $addresses = $this->addressRepository->getAllAddresses();

            return new ApiSuccessResponse(
                $addresses,
                str_replace(':name', 'Addresses', __('messages.retrieve.success')),
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
                'type' => ['required', 'string', Rule::enum(AddressTypesEnum::class)],
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
                'type' => $request->type,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'city' => $request->city,
                'state_id' => $request->state_id,
                'postcode' => $request->postcode,
                'country_id' => $request->country_id,
                'status' => $request->status,
            ];

            $address = $this->addressRepository->createAddress($data);

            return new ApiSuccessResponse(
                $address,
                str_replace(':name', 'Address', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(Address $address)
    {
        try {
            return new ApiSuccessResponse(
                $address,
                str_replace(':name', 'Address', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, Address $address)
    {
        try {
            $request->validate([
                'type' => ['required', 'string', Rule::enum(AddressTypesEnum::class)],
                'address_1' => ['required', 'string'],
                'address_2' => ['nullable', 'string'],
                'city' => ['required', 'string'],
                'state_id' => ['required', 'integer', 'exists:states,id'],
                'postcode' => ['required', 'string'],
                'country_id' => ['required', 'integer', 'exists:countries,id'],
                'status' => ['required', 'string', Rule::enum(CommonStatusesEnum::class)],
            ]);

            $data = [
                'type' => $request->type,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'city' => $request->city,
                'state_id' => $request->state_id,
                'postcode' => $request->postcode,
                'country_id' => $request->country_id,
                'status' => $request->status,
            ];

            $data = $this->addressRepository->updateAddress($address->id, $data);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Address', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(Address $address)
    {
        try {
            $this->addressRepository->deleteAddress($address->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Address', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
