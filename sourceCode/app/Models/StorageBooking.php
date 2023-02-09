<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StorageBooking extends Model
{
    protected $table = 'storage_bookings';

    protected $fillable = [
        'storage_details',
        'storage_dimensions',
        'starting_date',
        'ending_date',
        'price',
        'status',
        'storage_cat_id',
        'user_id',
        'user_name',
    ];

    public function storage_category()
    {
        return $this->belongsTo(StorageCategory::class, 'storage_cat_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
