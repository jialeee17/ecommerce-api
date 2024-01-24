<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, SoftDeletes, BlameableTrait;

    protected $fillable = [
        'name',
        'slug',
        'sku',
        'description',
        'type',
        'regular_price',
        'sale_price',
        'weight',
        'length',
        'width',
        'height',
        'image_path',
        'gallery_image_paths',
        'quantity',
        'category_id',
        'shipping_class_id',
        'status',
        'is_featured',
    ];

    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'gallery_image_paths' => 'array',
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * Get the route key for the model.
     */
    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    /* -------------------------------------------------------------------------- */
    /*                                Relationships                               */
    /* -------------------------------------------------------------------------- */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function shippingClass(): BelongsTo
    {
        return $this->belongsTo(ShippingClass::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tag', 'product_id', 'tag_id')
            ->withTimestamps()
            ->using(ProductTag::class);
    }

    public function attributes(): BelongsToMany
    {
        return $this->belongsToMany(ProductAttribute::class, 'product_attribute', 'product_id', 'attribute_id')
            ->withTimestamps()
            ->using(ProductAttribute::class);
    }
}
