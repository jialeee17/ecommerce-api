<?php

namespace Database\Seeders;

use App\Enums\PermissionsEnum;
use App\Enums\RolesEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = $this->getPermissions();

        foreach ($permissions as $permission) {
            if (!Permission::firstWhere('name', $permission['name'])) {
                Permission::create($permission);
            }
        }

        // create roles
        $roles = $this->getRoles();

        foreach ($roles as $role) {
            if (!Role::firstWhere('name', $role['name'])) {
                Role::create($role);
            }
        }
    }

    private function getRoles()
    {
        return [
            [
                'name' => RolesEnum::SUPER_ADMIN->value,
                'guard_name' => 'admins'
            ],
            [
                'name' => RolesEnum::ADMIN->value,
                'guard_name' => 'admins'
            ],
            [
                'name' => RolesEnum::CUSTOMER_SUPPORT->value,
                'guard_name' => 'admins'
            ],
            [
                'name' => RolesEnum::SALES_AND_MARKETING->value,
                'guard_name' => 'admins'
            ],
            [
                'name' => RolesEnum::ACCOUNTING_AND_FINANCE->value,
                'guard_name' => 'admins'
            ],
        ];
    }

    private function getPermissions()
    {
        return [
            // [
            //     'name' => PermissionsEnum::VIEW_ARTICLES->value,
            //     'guard_name' => 'admins'
            // ],
        ];
    }
}
