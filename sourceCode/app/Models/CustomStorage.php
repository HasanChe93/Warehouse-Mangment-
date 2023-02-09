<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomStorage extends Model
{
    protected $table='custom_storage';
    protected $fillable = [
        'user_id', 'storage_price', 'storage_name', 'storage_cat_id',
        'storage_description', 'storage_dimensions', 'start_date', 'end_date'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function storageCategory()
    {
        return $this->belongsTo(StorageCategory::class, 'storage_cat_id');
    }
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_DENIED = 'denied';

}

