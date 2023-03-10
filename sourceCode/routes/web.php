<?php

use App\Http\Controllers\ContactusController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsersController;

use App\Http\Controllers\ReviewuserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StorageListingController;
use App\Http\Controllers\StorageBookingController;
use App\Http\Controllers\UserPublicController;
use App\Http\Middleware\GuestMiddleware;
use App\Http\Controllers\CustomStorageBookingController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteservicesProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::post('/email', [EmailController::class, 'store'])->name('email.store');
Auth::routes();


Route::get('/', function () {
    return view('pages.index');
});

Route::get('/index', function () {
    return view('pages.index');
})->name('home');





Route::get('/about', function () {
    return view('pages.about');
})->name('about');



Route::get('/services', function () {
    return view('pages.services');
})->name('services');



Route::get('/storage', [StorageListingController::class, 'index'])->name('storage');
Route::post('/roomsearch', [StorageListingController::class, 'avilable'])->name('avilable');
Route::middleware([GuestMiddleware::class])->group(function () {
    Route::get('/storage/{id}/book', [StorageListingController::class, 'book'])->name('storage.book');
    Route::post('/storage/{id}/booking/confirm', [StorageListingController::class, 'confirm'])->name('storage.book.confirm');
});




Route::get('/team', function () {
    return view('pages.team');
});
Route::get('/testimonial', function () {
    return view('pages.testimonial');
});

Route::get('/privacy-policy', function () {
    return view('pages.privacy-policy');
});

Route::get('/Terms and Condition', function () {
    return view('pages.Terms and Condition');
});

Route::get('/dashboard', [StorageListingController::class, 'index'])->name('dashboard');



Route::resource('/userprofile', UserPublicController::class);


Route::resource('/contactus', ContactusController::class);
Route::resource('/review', ReviewuserController::class);


Route::get('middleware', function () {
    $collection = collect(Route::getRoutes())->map(function ($r) {
        if (isset($r->action['middleware']))
            return $r->action['middleware'];
    })->flatten();
  
});




Route::get('/Event&party', function () {
    return view('pages.Event&party');
});
Route::get('/Spa&Fitness', function () {
    return view('pages.Spa&Fitness');
});
Route::get('/Food&Restaurant', function () {
    return view('pages.Food&Restaurant');
});
Route::get('/GYM&Yoga', function () {
    return view('pages.GYM&Yoga');
});
Route::get('/Sports&Gaming', function () {
    return view('pages.Sports&Gaming');
});

Route::get('/create', function () {
    return view('pages.CSB_create');
});
