<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\UpsertCustomerRequest;
use Illuminate\Support\Facades\Hash;
use App\Http\Responses\ApiErrorResponse;
use App\Repositories\CustomerRepository;
use App\Http\Responses\ApiSuccessResponse;

class CustomerController extends Controller
{
    private $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function index()
    {
        try {
            $customers = $this->customerRepository->getAllCustomers();

            return new ApiSuccessResponse(
                $customers,
                str_replace(':name', 'Customers', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function store(UpsertCustomerRequest $request)
    {
        try {
            $customer = $this->customerRepository->createCustomer([
                'username' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'city' => $request->city,
                'state' => $request->state,
                'postcode' => $request->postcode,
                'country_id' => $request->country_id,
            ]);

            return new ApiSuccessResponse(
                $customer,
                str_replace(':name', 'Customer', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(Customer $customer)
    {
        try {
            return new ApiSuccessResponse(
                $customer,
                str_replace(':name', 'Customer', __('messages.retrieve.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(UpsertCustomerRequest $request, Customer $customer)
    {
        try {
            $data = [
                'username' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'address_1' => $request->address_1,
                'address_2' => $request->address_2,
                'city' => $request->city,
                'state' => $request->state,
                'postcode' => $request->postcode,
                'country_id' => $request->country_id,
                'status' => $request->status,
            ];

            $data = $this->customerRepository->updateCustomer($customer->id, $data);

            return new ApiSuccessResponse(
                $data,
                str_replace(':name', 'Customer', __('messages.update.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(Customer $customer)
    {
        try {
            $this->customerRepository->deleteCustomer($customer->id);

            return new ApiSuccessResponse(
                [],
                str_replace(':name', 'Customer', __('messages.delete.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
