<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    case VIEW_ADMINS = 'view admins';
    case CREATE_ADMINS = 'create admins';
    case READ_ADMINS = 'read admins';
    case UPDATE_ADMINS = 'update admins';
    case DELETE_ADMINS = 'delete admins';

    case VIEW_CUSTOMERS = 'view customers';
    case CREATE_CUSTOMERS = 'create customers';
    case READ_CUSTOMERS = 'read customers';
    case UPDATE_CUSTOMERS = 'update customers';
    case DELETE_CUSTOMERS = 'delete customers';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            static::VIEW_ADMINS => 'Create Admins',
            static::CREATE_ADMINS => 'Create Admins',
            static::READ_ADMINS => 'Read Admins',
            static::UPDATE_ADMINS => 'Update Admins',
            static::DELETE_ADMINS => 'Delete Admins',

            static::VIEW_CUSTOMERS => 'Create Customers',
            static::CREATE_CUSTOMERS => 'Create Customers',
            static::READ_CUSTOMERS => 'Read Customers',
            static::UPDATE_CUSTOMERS => 'Update Customers',
            static::DELETE_CUSTOMERS => 'Delete Customers',
        };
    }
}