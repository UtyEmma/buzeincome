<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppSettingsController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskCompletionController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WithdrawalController;
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
        Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    
        Route::get('/profile/security', [ProfileController::class, 'security'])->name('profile.edit');
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

        Route::get('/wallet', [ProfileController::class, 'wallet'])->name('profile.wallet');

        Route::get('/referrals', [ProfileController::class, 'referrals'])->name('profile.referral');

        Route::middleware('role:'.Roles::VENDOR)->group(function(){
            Route::get('/my-coupons', [VendorController::class, 'coupons'])->name('coupons.vendor-coupons');
            Route::get('/coupon-history', [VendorController::class, 'couponHistory'])->name('coupons.vendor-coupon-history');
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

            Route::prefix('withdrawals')->group(function(){
                Route::get('/', [WithdrawalController::class, 'list'])->name('withdrawals');

                Route::prefix('{withdrawal}')->group(function(){
                    Route::get('/delete', [WithdrawalController::class, 'destroy'])->name('withdrawal.delete');
                    Route::get('/{status}', [WithdrawalController::class, 'update'])->name('withdrawal.approve');
                });
            });

            Route::prefix('tasks')->group(function(){
                Route::get('/all', [TaskController::class, 'list'])->name('tasks.list');
                Route::post('/', [TaskController::class, 'store'])->name('tasks.store');

                Route::prefix('{task}')->group(function(){
                    Route::get('/', [TaskController::class, 'show'])->name('tasks.single');

                    Route::prefix('{taskCompletion}')->group(function(){
                        Route::get('/approve', [TaskCompletionController::class, 'verify'])->name('tasks.verify');
                    });
                    Route::post('/update', [TaskController::class, 'update'])->name('tasks.update');
                    Route::get('/delete', [TaskController::class, 'destroy'])->name('tasks.destroy');
                });
            });

            Route::middleware('role:'.Roles::SUPERADMIN)->group(function(){
                Route::prefix('settings')->group(function(){
                    Route::get('/', [AppSettingsController::class, 'index'])->name('settings');
                    Route::post('/', [AppSettingsController::class, 'update'])->name('settings.update');
                });

                Route::prefix('admins')->group(function(){
                    Route::get('/', [AdminController::class, 'index'])->name('admins');
                    Route::post('/', [AdminController::class, 'store'])->name('admins.store');

                    Route::prefix('{user}')->group(function(){
                        Route::get('/delete', [AdminController::class, 'destroy'])->name('admin.destroy');
                        Route::post('/update', [AdminController::class, 'update'])->name('admins.update');
                    });
                });
            });


        });

        Route::middleware('role:'.Roles::USER)->group(function(){
            Route::prefix('tasks')->group(function(){
                Route::get('/', [TaskController::class, 'index'])->name('tasks');
                
                Route::prefix('{task}')->group(function(){
                    Route::get('/complete', [TaskCompletionController::class, 'store'])->name('tasks.complete');
                });
            });

            Route::prefix('profile')->group(function(){
                Route::post('/bank-account', [ProfileController::class, 'updateBankAccount'])->name('profile.update-bank_account');
            });

            Route::prefix('wallet')->group(function(){
                Route::post('withdraw', [WithdrawalController::class, 'store'])->name('wallet.withdraw');
            });
        });
    });
});

require __DIR__.'/auth.php';

Route::get('/find-vendors', [VendorController::class, 'index'])->name('vendors');
Route::get('/verify-coupon', [CouponController::class, 'verifyCoupon'])->name('verifyCoupon');
Route::get('/contact-us', [CouponController::class, 'contact_us'])->name('contact-us');
