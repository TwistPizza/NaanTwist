<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\OurDeal;
use App\Models\StoreGallery;
class Store extends Model
{
    use HasFactory;

    // ✅ Fillable fields updated
    protected $fillable = [
        'store_code',  // new
        'name',
        'owner',
        'email',
        'phone',
        'address',
        'state_id',
        'city_id',
        'description',
        'map_link',
        'order_link',  // new
        'image',
    ];

    // Relationships
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function schedules()
    {
        return $this->hasMany(StoreSchedule::class);
    }
    public function deals()
{
    return $this->belongsToMany(OurDeal::class, 'our_deal_store', 'store_id', 'our_deal_id')
                ->where('is_available', 1);
}
public function gallery()
    {
        return $this->hasMany(StoreGallery::class, 'store_id');
    }
}