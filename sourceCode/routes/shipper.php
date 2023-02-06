<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactusAdminController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductAdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ShipperCategoryController;

use App\Http\Middleware\ShipperMiddleware;

Route::middleware([ShipperMiddleware::class])->name('shipper.')->prefix('shipper')->group(function () {
    Route::resource('/products', ProductsController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/booking', BookingController::class);
    Route::get('/dashboardShipper', [HomeController::class, 'index']);
    Route::resource('/categories', ShipperCategoryController::class);
    Route::resource('/roomsAdmin', RoomController::class);
    Route::resource('/categoryAdmin', CategoryController::class);
    Route::resource('/reviewsAdmin', ReviewController::class);
    Route::resource('/contactAdmin', ContactusAdminController::class);
});
