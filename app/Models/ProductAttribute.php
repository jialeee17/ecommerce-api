<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductAttribute extends Pivot
{
    use HasFactory, BlameableTrait;

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
