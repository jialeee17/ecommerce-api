<?php

namespace Database\Seeders;

use App\Enums\RolesEnum;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = $this->getUsers();

        foreach ($users as $user) {
            $admin = Admin::updateOrCreate(
                ['username' => $user['username']],
                ['first_name' => $user['first_name'], 'email' => $user['email'], 'password' => Hash::make($user['password'])]
            );

            if ($user['is_super_admin']) {
                $admin->assignRole([RolesEnum::SUPER_ADMIN->value]);
            }
        }
    }

    private function getUsers(): array
    {
        return [
            [
                'username' => 'superadmin',
                'first_name' => 'Super Admin',
                'email' => 'superadmin@gmail.com',
                'password' => 'password',
                'is_super_admin' => true
            ]
        ];
    }
}
