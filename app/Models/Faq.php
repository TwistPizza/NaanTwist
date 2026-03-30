<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faq extends Model
{
    use HasFactory;
     protected $fillable = [
        'store_id',
        'question',
        'answer',
        'is_active',
        'sort_order'
    ];

    public function store()
{
    return $this->belongsTo(Store::class);
}
}

