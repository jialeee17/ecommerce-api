<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_code',
        'currency',
        'flag_path',
    ];

    /* -------------------------------------------------------------------------- */
    /*                                Relationships                               */
    /* -------------------------------------------------------------------------- */
    public function customers(): HasMany
    {
        return $this->hasMany(Customer::class);
    }

    public function states(): HasMany
    {
        return $this->hasMany(State::class);
    }
}
