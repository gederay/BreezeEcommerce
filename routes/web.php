<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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
    return view('store.home');
})->name('store.home');

Route::resource('/products', ProductController::class);

Route::get('/contacts', function () {
    return view('store.contacts');
})->name('store.contacts');


Route::middleware('auth', 'verified')->prefix('admin')->as('admin.')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/report', [DashboardController::class, 'report'])->name('dashboard.report');

    Route::resource('/products', AdminProductController::class);
});

require __DIR__ . '/auth.php';
