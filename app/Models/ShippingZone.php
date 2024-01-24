<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ShippingZone extends Model
{
    use HasFactory, BlameableTrait;

    protected $fillable = [
        'name',
        'status',
    ];

    protected $hidden = [
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d H:i:s',
        'updated_at' => 'datetime:Y-m-d H:i:s',
    ];

    // Override default configuration (Eloquent Blameable)
    protected static $blameable = [
        'deletedBy' => null,
    ];

    /* -------------------------------------------------------------------------- */
    /*                                Relationships                               */
    /* -------------------------------------------------------------------------- */
    public function shippingMethods(): BelongsToMany
    {
        return $this->belongsToMany(ShippingMethod::class, 'shipping_zone_method', 'shipping_zone_id', 'shipping_method_id')
            ->withTimestamps()
            ->using(ShippingZoneMethod::class);
    }

    public function regions(): BelongsToMany
    {
        return $this->belongsToMany(State::class, 'shipping_zone_region', 'shipping_zone_id', 'state_id')
            ->withTimestamps()
            ->using(ShippingZoneRegion::class);
    }
}
