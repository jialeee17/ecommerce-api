<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ShippingMethod extends Model
{
    use HasFactory, SoftDeletes, BlameableTrait;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'status'
    ];

    protected $hidden = [
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    // Override default configuration (Eloquent Blameable)
    protected static $blameable = [
        'createdBy' => null,
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
    public function shippingZones(): BelongsToMany
    {
        return $this->belongsToMany(ShippingZone::class, 'shipping_zone_method', 'shipping_method_id', 'shipping_zone_id')
            ->withTimestamps()
            ->using(ShippingZoneMethod::class);
    }
}
