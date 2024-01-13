<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use RichanFongdasen\EloquentBlameable\BlameableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Setting extends Model
{
    use HasFactory, SoftDeletes, BlameableTrait;

    protected $with = [
        'settingCategory',
    ];

    protected $fillable = [
        'name',
        'value',
        'description',
        'setting_category_id',
        'status'
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
        'createdBy' => null,
    ];

    /* -------------------------------------------------------------------------- */
    /*                                Relationships                               */
    /* -------------------------------------------------------------------------- */
    public function settingCategory(): BelongsTo
    {
        return $this->belongsTo(SettingCategory::class);
    }
}
