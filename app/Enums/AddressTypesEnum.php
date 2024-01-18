<?php

namespace App\Enums;

enum AddressTypesEnum: string
{
    case BILLING = 'billing';
    case SHIPPING = 'shipping';

    public function label(): string
    {
        return match ($this) {
            static::BILLING => 'Billing',
            static::SHIPPING => 'Shipping',
        };
    }
}
