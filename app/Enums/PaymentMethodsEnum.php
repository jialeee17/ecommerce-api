<?php

namespace App\Enums;

enum PaymentMethodsEnum: string
{
    case DIRECT_BANK_TRANSFER = 'direct bank transfer';
    case CHECK_PAYMENTS = 'check payments';
    case CASH_ON_DELIVERY = 'cash on delivery';
    case PAYPAL = 'paypal';

    public function label(): string
    {
        return match ($this) {
            static::DIRECT_BANK_TRANSFER => 'Direct bank transfer',
            static::CHECK_PAYMENTS => 'Check payments',
            static::CASH_ON_DELIVERY => 'Cash on delivery',
            static::PAYPAL => 'PayPal Standard',
        };
    }
}
