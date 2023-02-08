<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $guarded=[];

    protected $fillable =
    [
      'product_name', 'brand_name', 'shipper_name','cat_name',
      'product_model', 'product_price', 'product_quantity', 'product_description','product_image1','product_image2','product_image3','product_image4'
    ];
    use HasFactory;
}
