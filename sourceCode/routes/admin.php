<?php

use App\Http\Controllers\AdminCustomStorageController;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactusAdminController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;

use App\Http\Controllers\ShippersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\StorageCategoryController;
use App\Http\Controllers\StoragesController;
use App\Http\Controllers\CustomStorageBookingController;
use App\Http\Middleware\AdminMiddleware;
use App\Models\CustomStorage;
use App\Models\StorageCategory;
// use GuzzleHttp\Psr7\Request;

Route::middleware([AdminMiddleware::class])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('/products', ProductController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/shippers', ShippersController::class);
    Route::resource('/employees', EmployeesController::class);

    Route::resource('/booking', BookingController::class);
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    Route::resource('/categories', CategoryController::class);
    Route::resource('/StorageCategory', StorageCategoryController::class);
    // Route::resource('/productsAdmin', ProductAdminController::class);
    Route::resource('/storagesAdmin', StoragesController::class);

    Route::resource('/categoryAdmin', CategoryController::class);
    // Route::resource('/productAdmin', ProductsController::class);
    Route::resource('/reviewsAdmin', ReviewController::class);
    Route::resource('/contactAdmin', ContactusAdminController::class);
    
    Route::get('/CSB_index', [CustomStorageBookingController::class, 'index'])->name('admin.custom_storage_bookings.index');
Route::post('/admin/custom-storage-bookings/{customStorageBooking}/approve', [CustomStorageBookingController::class, 'approve'])->name('admin.custom_storage_bookings.approve');


    
});
