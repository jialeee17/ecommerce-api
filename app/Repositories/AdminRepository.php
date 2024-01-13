<?php

namespace App\Repositories;

use App\Models\Admin;
use App\Interfaces\AdminRepositoryInterface;

class AdminRepository implements AdminRepositoryInterface
{
    public function getAllAdmins()
    {
        return Admin::all();
    }

    public function createAdmin(array $data)
    {
        return Admin::create($data);
    }

    public function updateAdmin($id, array $data)
    {
        $admin = Admin::findOrFail($id);
        $admin->update($data);

        return $admin;
    }

    public function deleteAdmin($id)
    {
        $admin = Admin::findOrFail($id);

        if ($admin->tokens()->count() > 0) {
            $admin->tokens()->delete();
        }

        return $admin->delete();
    }
}
