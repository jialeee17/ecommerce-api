<?php

namespace App\Enums;

enum ShippingMethodsEnum: string
{
    case FREE_SHIPPING = 'free shipping';
    case FLAT_RATE = 'flat rate';
    case LOCAL_PICKUP = 'local pickup';

    public function label(): string
    {
        return match ($this) {
            static::FREE_SHIPPING => 'Free Shipping',
            static::FLAT_RATE => 'Flat Rate',
            static::LOCAL_PICKUP => 'Local Pickup',
        };
    }
}
