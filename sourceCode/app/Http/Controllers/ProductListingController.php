<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\StorageCategory;
use App\Models\Storage;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class StorageListingController extends Controller
{

    public function index()
    {
        $cat = StorageCategory::all();
        $storages = DB::table('storages')
            ->join('storage_categories', 'storages.storage_cat_id', '=', 'storage_categories.id')
            ->select('storages.*', 'storage_categories.storage_cat_name')->where('status', '=', '1')
            ->get();
        return view('pages.storage', [
            'storages' => $storages,
            'cat' => $cat
        ]);
    }


    public function avilable(Request $request)
    {

        $cat = StorageCategory::all();
        $user_date_input = Booking::where('checkIn_date', '>=', "{$request->from}")
            ->where('checkOut_date', '<=', "{$request->to}")
            ->get("storage_id");

        $available = Storage::whereNotIn('id', $user_date_input)->get();
        $available = $available->where('storage_cat_id', $request->storage_cat_id);
        // $available= $available->where('number_of_beds',$request->beds);


        return view('pages.storage', [
            'storages' => $available,
            'cat' => $cat



        ]);
    }







    public function book($id)
    {



        $storage = Storage::find($id);
        $user = Auth::user();
        return view('pages.booking', [
            'storage' => $storage,
            'user' => $user
        ]);
    }


    public function confirm($id, Request $request)
    {
        try {

            $storage = Storage::find($id);
            $user = Auth::user();
            $insert = new Storage();

            $start_date = Carbon::parse($request->input('checkin'));
            $end_date = Carbon::parse($request->input('checkout'));
            $storage_price = $storage->storage_price;
            $special_request = $request->special_request;

            $booking = $insert->bookForUser($storage->id, $user->id, $start_date, $end_date, $storage_price, $special_request, $storage->storage_dimensions, $storage->storage_name);

            return redirect('userprofile');
        } catch (\Exception $e) {

            return redirect()->route('storage.book', $storage->id)->with('errorx',  $e->getMessage());
        }
    }
}
