<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Throwable;

class Storage extends Model
{
  use HasFactory;

  protected $fillable =
  [
    'storage_cat_name', 'storage_dimensions', 's_meter_price','storage_name	',
    'status', 'storage_image', 'storage_description', 'name','special_request'
  ];


  public function StorageCategory(): \Illuminate\Database\Eloquent\Relations\BelongsTo
  {
    return $this->belongsTo(StorageCategory::class);
  }

  public function reviews()
  {
    return $this->hasMany(review::class);
  }


  public function bookForUse($userId, $storageId,$storage_name, $start_date, $end_date, $s_meter_price,$special_request, $storage_dimensions)
  {

    //1. check the storage availability

    if ($end_date <= $start_date) {
      abort(403, "invalid date");
    }

    $from = $start_date->toDateString();
    $to = $end_date->toDateString();


    $diff = $start_date->diffInDays($end_date);

    $totalPrice = ($diff * $s_meter_price * $storage_dimensions );
    $tax = $totalPrice * 16 / 100;
    $finalAmount =  $tax + $totalPrice;


    $reserved = Booking::where('storage_id', $storageId)
    ->where('checkIn_date', '<=', $from)
    ->where('checkOut_date', '>=', $to)
    ->orWhereBetween('checkOut_date', [$from, $to])
    ->where('storage_id', $storageId)->count();;



    $reserved2 = Booking::where('storage_id', $storageId)
      ->whereBetween('checkIn_date', [$from, $to])->count();



    // Show results of log

    if ($reserved2 > 0 || $reserved > 0)

      abort(403, "The Storage is not available for this date. Please selected different date.");


    //2. Book the storage

    $booking = new Booking();
    $booking->storage_name = $storage_name;
    $booking->user_id = $userId;
    $booking->storage_id = $storageId;
    $booking->totalAmount = $finalAmount;
    $booking->checkIn_date = $from;
    $booking->checkOut_date = $to;
    $booking->special_request = $special_request;

    $booking->save();

    return $booking;
  }
}
