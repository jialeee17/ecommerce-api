<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
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
