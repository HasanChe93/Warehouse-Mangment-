<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\category;
use App\Models\contactus;
use App\Models\Product;
use App\Models\review;
use App\Models\room;
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
        $allRooms = room::all()->count();

        $allreview = review::all()->count();
        $allReservations = Booking::all()->count();
        $allmessages = contactus::all()->count();

        if (Auth::user()->role == 'admin') {
            return view('/dashboard', [
                'allUsers' => $allUsers->count(),
                'allShippers' => $allShippers->count(),
                'allEmployees' => $allEmployees->count(),
                'allProducts' => $allProducts,
                'allCategory' => $allCategory,
                'allStorageCategory' => $allStorageCategory,
                'allRooms' => $allRooms,
                'allreview' => $allreview,
                'allReservations' => $allReservations,
                'allmessages' => $allmessages,

            ]);
        } elseif (Auth::user()->role == 'shipper') {
            return view('/dashboardShipper', [
                'allUsers' => $allUsers->count(),
                'allShippers' => $allShippers->count(),
                'allEmployees' => $allEmployees->count(),
                'allProducts' => $allProducts,
                'allCategory' => $allCategory,
                'allStorageCategory' => $allStorageCategory,
                'allRooms' => $allRooms,
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
                'allRooms' => $allRooms,
                'allreview' => $allreview,
                'allReservations' => $allReservations,
                'allmessages' => $allmessages

            ]);
        } else  return view('/index');
    }
}
