<?php

namespace App\Enums;

enum ProductTypesEnum: string
{
    case SIMPLE = 'simple'; // Simple products are shipped and have no options. For example, a book.
    case VARIABLE = 'variable'; // Variable products are products with variations, each of which may have a different SKU, price, stock option, etc.

    public function label(): string
    {
        return match ($this) {
            static::SIMPLE => 'Simple',
            static::VARIABLE => 'Variable',
        };
    }
}