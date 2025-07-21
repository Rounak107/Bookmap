<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Service;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceDetailController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminBookingController;
use Illuminate\Support\Facades\Response;
use App\Http\Controllers\Auth\OTPLoginController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\AdminDashboardController;

require __DIR__.'/auth.php';

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/service-details/{slug}', [ServiceDetailController::class, 'show'])->name('service.details');

// Admin Login Routes
Route::get('/admin/bookings/b4uzyd61f0s5-a2b4cc2', [AdminLoginController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/bookings/b4uzyd61f0s5-a2b4cc2', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

Route::get('/admin/bookings/yend8rv-29s6f1-d68s', [AdminBookingController::class, 'index'])->name('admin.bookings');
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

//OTP Generator
Route::get('/login', [OTPLoginController::class, 'showOtpForm'])->name('login');
Route::post('/send-otp', [OTPLoginController::class, 'sendOtp'])->name('otp.send');
Route::post('/verify-otp', [OTPLoginController::class, 'verifyOtp'])->name('otp.verify');


// Services
Route::resource('services', ServiceController::class)->only(['index', 'show']);

//Location & Service SE
Route::get('/service-search', function (Request $request) {
    $query = $request->input('term');

    $allowed = [
        'Air Conditioner', 'Washing Machine', 'Air Cooler Services', 'Inverter & Stabilizer',
        'Television', 'Laptop', 'Desktop', 'Water Purifier',
        'Refrigerator', 'Geyser Services', 'Kitchen Service (Refrigerator)', 'Gas Stove & Hob Cleaning',
        'Microwave', 'Microwave Checkup', 'Chimney', 'Modular Kitchen',
        'Interior Design Consultation',            // ✅ for Home Interior
        'False Ceiling Setup',                     // ✅ matches slug 'false-ceiling-setup'
        'Texture Wall Painting',                   // ✅ for Wall Painting
        'Interior Wall Painting',                  // optional if you want both variants
        'Designer Wallpaper Installation',
        'Custom Interior Wall Printing',
        'Kids Room Cartoon Wall Painting'
    ];

    return \App\Models\Service::whereIn('name', $allowed)
        ->where('name', 'like', '%' . $query . '%')
        ->select('name', 'slug')
        ->limit(20)
        ->get();
});

// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{serviceId}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/increase/{id}', [CartController::class, 'increase'])->name('cart.increase');
Route::delete('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
Route::post('/cart/decrease/{id}', [CartController::class, 'decrease'])->name('cart.decrease');
Route::post('/cart/update-date/{id}', [CartController::class, 'updateDate']);

// Checkout
Route::middleware(['auth'])->group(function () {
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/confirm', [CheckoutController::class, 'confirmBooking'])->name('checkout.confirm');
});

// Booking dummy
Route::get('/booking/create', function () {
    return 'Booking page under construction.';
})->name('booking.create');

// Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});

// Bookings
Route::prefix('bookings')->group(function () {
    Route::get('/', [BookingController::class, 'index'])->name('bookings.index');
    Route::get('/bookings/create/{service}', [BookingController::class, 'create'])->name('bookings.create');
    Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');
    Route::get('/success/{booking}', [BookingController::class, 'success'])->name('bookings.success');
});

// Privacy and Terms pages
Route::get('/privacy-policy', function () {
    return view('policies.privacy');
})->name('privacy');

Route::get('/terms-of-service', function () {
    return view('policies.terms');
})->name('terms');
