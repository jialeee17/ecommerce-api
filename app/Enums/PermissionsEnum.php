<?php

namespace App\Enums;

enum PermissionsEnum: string
{
    // case VIEW_ARTICLES = 'view articles';

    // extra helper to allow for greater customization of displayed values, without disclosing the name/value data directly
    public function label(): string
    {
        return match ($this) {
            // static::VIEW_ARTICLES => 'View Articles',
        };
    }
}