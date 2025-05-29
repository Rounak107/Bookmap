<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


// Home
Route::get('/', [ServiceController::class, 'index'])->name('home');
/*
// Authentication Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::resource('bookings', BookingController::class);
});
*/

// Authentication
Auth::routes();

// Services
Route::resource('services', ServiceController::class)->only(['index', 'show']);

// Profile Routes
Route::middleware('auth')->group(function () {
   Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
   // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Bookings
Route::prefix('bookings')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/{service}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/{service}', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/success/{booking}', [BookingController::class, 'success'])->name('bookings.success');
    //Route::get('/cancel/{booking}', [BookingController::class, 'cancel'])->name('bookings.cancel');
});