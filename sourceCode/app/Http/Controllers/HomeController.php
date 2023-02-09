<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\category;
use App\Models\contactus;
use App\Models\CustomStorage;
use App\Models\Product;
use App\Models\review;
use App\Models\Storage;
use App\Models\StorageCategory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('admin');
        $this->middleware('shipper');
        $this->middleware('employee');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $allUsers = User::get()->where('role', 'user');;
        $allShippers = User::get()->where('role', 'shipper');
        $allEmployees = User::get()->where('role', 'employee');
        $allProducts = Product::all()->count();
        $allCategory = category::all()->count();
        $allStorageCategory = StorageCategory::all()->count();
        $allStorages = Storage::all()->count();

        $allreview = review::all()->count();
        $allReservations = Booking::all()->count();
        $allmessages = contactus::all()->count();
        $allCustomStorage = CustomStorage::all()->count();

        if (Auth::user()->role == 'admin') {
            return view('/dashboard', [
                'allUsers' => $allUsers->count(),
                'allShippers' => $allShippers->count(),
                'allEmployees' => $allEmployees->count(),
                'allProducts' => $allProducts,
                'allCategory' => $allCategory,
                'allStorageCategory' => $allStorageCategory,
                'allStorages' => $allStorages,
                'allreview' => $allreview,
                'allReservations' => $allReservations,
                'allmessages' => $allmessages,
                'allCustomStorage' => $allCustomStorage

            ]);
        } elseif (Auth::user()->role == 'shipper') {
            return view('/dashboardShipper', [
                'allUsers' => $allUsers->count(),
                'allShippers' => $allShippers->count(),
                'allEmployees' => $allEmployees->count(),
                'allProducts' => $allProducts,
                'allCategory' => $allCategory,
                'allStorageCategory' => $allStorageCategory,
                'allStorages' => $allStorages,
                'allreview' => $allreview,
                'allReservations' => $allReservations,
                'allmessages' => $allmessages,


            ]);
        } elseif (Auth::user()->role == 'employee') {
            return view('/dashboardEmployee', [
                'allUsers' => $allUsers->count(),
                'allShippers' => $allShippers->count(),
                'allEmployees' => $allEmployees->count(),
                'allProducts' => $allProducts,
                'allCategory' => $allCategory,
                'allStorages' => $allStorages,
                'allReservations' => $allReservations,
                'allmessages' => $allmessages,
                'allStorageCategory' => $allStorageCategory,
                'allCustomStorage' => $allCustomStorage


            ]);
        } else  return view('/index');
    }
}
