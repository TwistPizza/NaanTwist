<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreSchedule extends Model
{
    use HasFactory;

    // ✅ Sirf ye fields fillable rakhna
    protected $fillable = [
        'store_id',
        'day',
        'open_time',
        'close_time',
    ];

    // Relationship with Store
    public function store()
    {
        return $this->belongsTo(Store::class);
    }
}