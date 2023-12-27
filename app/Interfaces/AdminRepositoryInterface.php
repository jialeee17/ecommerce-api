<?php

namespace App\Interfaces;

interface AdminRepositoryInterface
{
    public function getAllAdmins();
    public function createAdmin(array $data);
    public function updateAdmin($id, array $data);
    public function deleteAdmin($id);
}
