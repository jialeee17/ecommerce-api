<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProductVariation extends Model
{
    use HasFactory, BlameableTrait;

    protected $fillable = [
        'product_id',
        'attribute_combination',
        'sku',
        'description',
        'regular_price',
        'sale_price',
        'weight',
        'length',
        'width',
        'height',
        'image_path',
        'quantity',
    ];

    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'attribute_combination' => 'array',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];
}
