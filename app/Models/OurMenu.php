<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OurMenu extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'is_available',
    ];

    protected $casts = [
        'is_available' => 'boolean',
    ];
}