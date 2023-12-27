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
        return Admin::findOrFail($id)->update($data);
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
