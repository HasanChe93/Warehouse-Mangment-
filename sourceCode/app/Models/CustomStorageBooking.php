<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomStorageBooking extends Model
{
    public function storageCategory()
    {
        return $this->belongsTo(StorageCategory::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
