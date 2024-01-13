<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Http\Requests\UpsertCustomerRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AdminRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Repositories\CustomerRepository;
use App\Http\Responses\ApiSuccessResponse;

class AuthController extends Controller
{
    private $adminRepository;
    private $customerRepository;

    public function __construct(AdminRepository $adminRepository, CustomerRepository $customerRepository)
    {
        $this->adminRepository = $adminRepository;
        $this->customerRepository = $customerRepository;
    }

    // Admins Guard
    public function adminLogin(Request $request)
    {
        try {
            // Authenticate backend user (customer)
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (!Auth::guard('admins')->attempt($request->only('email', 'password'))) {
                throw new Exception('Invalid Credentials.');
            }

            $user = Auth::user();
            $user->last_login_at = Carbon::now();
            $user->save();

            return new ApiSuccessResponse(
                [
                    'user' => Auth::user()
                ],
                'Login Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function adminRegister(Request $request)
    {
        try {
            $request->validate([
                'username' => ['required', 'string', 'unique:admins,username'],
                'first_name' => ['required', 'string'],
                'last_name' => ['nullable', 'string'],
                'email' => ['required', 'email', 'unique:admins,email'],
                'password' => ['required', 'string'],
            ]);

            $admin = $this->adminRepository->createAdmin([
                'username' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            return new ApiSuccessResponse(
                [
                    'user' => $admin
                ],
                str_replace(':name', 'Admin', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    // Customers Guard
    public function customerLogin(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (!Auth::guard('customers')->attempt($request->only('email', 'password'))) {
                throw new Exception('Invalid Credentials.');
            }

            $user = Auth::user();
            $user->last_login_at = Carbon::now();
            $user->save();

            return new ApiSuccessResponse(
                [
                    'user' => Auth::user()
                ],
                'Login Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function customerRegister(UpsertCustomerRequest $request)
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
                [
                    'user' => $customer
                ],
                str_replace(':name', 'Customer', __('messages.create.success')),
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
