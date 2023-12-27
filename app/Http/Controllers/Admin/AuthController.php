<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AdminRepository;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;

class AuthController extends Controller
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function authenticate(Request $request)
    {
        try {
            $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            $remember = $request->remember ?? false;

            if (!Auth::guard('admins')->attempt($request->only('email', 'password'), $remember)) {
                throw new Exception('Invalid Credentials.');
            }

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

    public function register(Request $request)
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
                $admin,
                'Register Admin Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
