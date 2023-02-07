<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageCategory extends Model
{
    protected $fillable = [
        'storage_cat_name',
        'storage_cat_img',
        
    ];
    public function rooms(){
        return $this->hasMany(room::class);
    }}
