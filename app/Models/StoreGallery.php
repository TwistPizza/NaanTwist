<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StoreGallery extends Model
{
    protected $fillable = [
        'store_id',
        'image',
        'caption',
        'sort_order',
    ];

    public function store(): BelongsTo
    {
        return $this->belongsTo(Store::class);
    }
}