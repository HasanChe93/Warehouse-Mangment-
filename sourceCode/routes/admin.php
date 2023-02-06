<?php

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
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ShippersController;
use App\Http\Controllers\EmployeesController;
use App\Http\Middleware\AdminMiddleware;

Route::middleware([AdminMiddleware::class])->name('admin.')->prefix('admin')->group(function () {
    Route::resource('/products', ProductController::class);
    Route::resource('/users', UsersController::class);
    Route::resource('/shippers', ShippersController::class);
    Route::resource('/employees', EmployeesController::class);

    Route::resource('/booking', BookingController::class);
    Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');
    // Route::get('/admin/users/search', [UsersController::class, 'search'])->name('admin.users.search');


    Route::resource('/categories', CategoryController::class);
    // Route::resource('/productsAdmin', ProductAdminController::class);
    Route::resource('/roomsAdmin', RoomController::class);
    Route::resource('/categoryAdmin', CategoryController::class);
    // Route::resource('/productAdmin', ProductsController::class);
    Route::resource('/reviewsAdmin', ReviewController::class);
    Route::resource('/contactAdmin', ContactusAdminController::class);
});
