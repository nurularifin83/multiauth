<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Seller;
use App\Http\Controllers\SellerController;

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
/* --------------------------------Admin Route----------------------------*/
Route::prefix('admin')->group(function () {
    Route::controller(AdminController::class)->group(function() {
        Route::get('/login', 'Index')->name('login_form');
        Route::post('/login/owner', 'Login')->name('admin.login');
        Route::get('/dashboard', 'Dashboard')->name('admin.dashboard')->middleware('admin');
        Route::get('/logout', 'AdminLogout')->name('admin.logout')->middleware('admin');
        Route::get('/register', 'AdminRegister')->name('admin.register');
        Route::post('/register/create', 'AdminRegisterCreate')->name('admin.register.create');
    });
});
/* --------------------------------End Admin Route----------------------------*/

/* --------------------------------Seller Route----------------------------*/
Route::prefix('seller')->group(function () {
    Route::controller(SellerController::class)->group(function() {
        Route::get('/login', 'Index')->name('login_form');
        Route::post('/login/owner', 'Login')->name('seller.login');
        Route::get('/dashboard', 'Dashboard')->name('seller.dashboard')->middleware('seller');
        Route::get('/logout', 'SellerLogout')->name('seller.logout')->middleware('seller');
        Route::get('/register', 'SellerRegister')->name('seller.register');
        Route::post('/register/create', 'SellerRegisterCreate')->name('seller.register.create');
    });
});
/* --------------------------------End Seller Route----------------------------*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
