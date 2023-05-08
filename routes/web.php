<?php

use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Library\Roles;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::middleware('verified')->group(function(){
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::middleware('role:'.Roles::VENDOR)->group(function(){
            Route::get('/my-coupons', [VendorController::class, 'coupons'])->name('coupons.vendor-coupons');
            Route::get('/my-users', [VendorController::class, 'users'])->name('coupons.vendor-users');
        });

        Route::middleware('role:'.Roles::ANYADMIN)->group(function() {
            Route::prefix('users')->group(function(){
                Route::get('/', [UserController::class, 'list'])->name('users.list');
            });
    
            Route::prefix('vendors')->group(function(){
                Route::get('/', [VendorController::class, 'list'])->name('vendors.list');
                Route::post('/', [VendorController::class, 'store'])->name('vendors.store');

                Route::prefix('{user}')->group(function(){
                    Route::get('/delete', [VendorController::class, 'destroy'])->name('vendors.destroy');
                });
            });
        });
    });
});

require __DIR__.'/auth.php';
