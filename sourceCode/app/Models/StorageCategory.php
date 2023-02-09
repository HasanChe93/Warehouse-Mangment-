<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StorageCategory extends Model
{
    protected $table ='storage_categories';
    

    protected $fillable = [
        'storage_cat_name',
        'storage_cat_img',
        
    ];
    public function storages(){
        return $this->hasMany(storage::class);
    }}
