<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExclusiveDealsStoreUser extends Model
{
    protected $table = 'exclusive_deals_store_user'; // table name

    protected $fillable = ['store_id', 'name', 'phone', 'email'];
}