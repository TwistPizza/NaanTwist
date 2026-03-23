<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Store;
class OurDeal extends Model
{
    protected $fillable = [
        'name',
        'description',
        'section',
        'image',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
    ];

    public function stores(): BelongsToMany
    {
        return $this->belongsToMany(Store::class, 'our_deal_store');
    }
}