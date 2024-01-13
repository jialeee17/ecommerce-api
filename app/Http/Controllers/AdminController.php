<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Enums\UserStatusesEnum;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use App\Repositories\AdminRepository;
use Illuminate\Support\Facades\Storage;
use App\Http\Responses\ApiErrorResponse;
use App\Http\Responses\ApiSuccessResponse;

class AdminController extends Controller
{
    private $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function index()
    {
        try {
            $admins = $this->adminRepository->getAllAdmins();

            return new ApiSuccessResponse(
                $admins,
                'Retrieve Admin List Successfully.',
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
                'username' => ['required', 'string', 'unique:admins,username'],
                'first_name' => ['required', 'string'],
                'last_name' => ['nullable', 'string'],
                'email' => ['required', 'email', 'unique:admins,email'],
                'password' => ['required'],
                'status' => [Rule::enum(UserStatusesEnum::class)],
            ]);

            $admin = $this->adminRepository->createAdmin([
                'username' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'status' => $request->status,
            ]);

            return new ApiSuccessResponse(
                $admin,
                'Create Admin Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function show(Admin $admin)
    {
        try {
            return new ApiSuccessResponse(
                $admin,
                'Retrieve Admin Details Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function update(Request $request, Admin $admin)
    {
        try {
            $request->validate([
                'username' => ['required', 'string', Rule::unique('admins', 'username')->ignore($admin)],
                'first_name' => ['required', 'string'],
                'last_name' => ['nullable', 'string'],
                'email' => ['required', 'email', Rule::unique('admins', 'email')->ignore($admin)],
                'password' => ['required'],
                'phone' => ['nullable', 'string'],
                'avatar' => ['nullable', 'image'],
                'status' => [Rule::enum(UserStatusesEnum::class)],
            ]);

            $data = [
                'username' => $request->username,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'status' => $request->status,
            ];

            if ($request->hasFile('avatar')) {
                if ($path = $admin->avatar_path) {
                    Storage::delete($path);
                }

                $path = $request->file('avatar')->store('avatars');

                $data['avatar_path'] = $path;
            }

            $data = $this->adminRepository->updateAdmin($admin->id, $data);

            return new ApiSuccessResponse(
                $data,
                'Update Admin Details Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }

    public function destroy(Admin $admin)
    {
        try {
            $this->adminRepository->deleteAdmin($admin->id);

            return new ApiSuccessResponse(
                [],
                'Delete Admin Successfully.',
            );
        } catch (Exception $e) {
            return new ApiErrorResponse(
                $e->getMessage(),
                $e,
            );
        }
    }
}
