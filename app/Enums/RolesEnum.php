<?php

namespace App\Enums;

enum RolesEnum: string
{
    case SUPER_ADMIN = 'super admin';
    case ADMIN = 'admin';
    case CUSTOMER_SUPPORT = 'customer support';
    case SALES_AND_MARKETING = 'sales and marketing';
    case ACCOUNTING_AND_FINANCE = 'accounting and finance';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            static::SUPER_ADMIN => 'Super Admin',
            static::ADMIN => 'Admin',
            static::CUSTOMER_SUPPORT => 'Customer Support',
            static::SALES_AND_MARKETING => 'Sales and Marketing',
            static::ACCOUNTING_AND_FINANCE => 'Accounting and Finance',
        };
    }
}