<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Customer\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Customer\CartController;

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


Route::middleware(['guestOrVerified'])->group(function () {
    Route::get('/', function () {
        return view('store.home');
    })->name('store.home');

    Route::resource('/products', ProductController::class);

    Route::get('/contacts', function () {
        return view('store.contacts');
    })->name('store.contacts');

    Route::prefix('/cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add/{product:slug}', [CartController::class, 'add'])->name('add');
        Route::post('/remove/{product:slug}', [CartController::class, 'remove'])->name('remove');
        Route::post('/update-quantity/{product:slug}', [CartController::class, 'updateQuantity'])->name('update-quantity');
    });
});

Route::middleware('auth', 'verified')->prefix('admin')->as('admin.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Upload file product create
    Route::controller(UploadController::class)->group(function () {
        Route::post('/upload', 'upload')->name('upload');
        Route::delete('/delete', 'delete')->name('delete');
    });
    Route::post('/upload', [UploadController::class, 'upload'])->name('upload');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/report', [DashboardController::class, 'report'])->name('dashboard.report');

    Route::resource('/products', AdminProductController::class);
});

require __DIR__ . '/auth.php';
