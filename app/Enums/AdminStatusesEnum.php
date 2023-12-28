<?php

namespace App\Enums;

enum AdminStatusesEnum: string
{
    case ACTIVE = 'active';
    case SUSPENDED = 'suspended';

    public function label(): string
    {
        return match ($this) {
            static::ACTIVE => 'Active',
            static::SUSPENDED => 'Suspended',
        };
    }
}