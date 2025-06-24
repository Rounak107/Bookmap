<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Razorpay\Api\Api;

class CheckoutController extends Controller
{
    public function index()
{
    // Get cart data from session
    $cart = session()->get('cart', []);

    // Redirect if cart is empty
    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
    }

    // Calculate total
    $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);

    // ✅ FIX: Correct way to get logged-in user
    $user = auth()->user();

    // Pass all to checkout view
    return view('checkout', compact('cart', 'total', 'user'));
}

   public function confirmBooking(Request $request)
{
    $user = Auth::user();
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect('/cart')->with('error', 'Your cart is empty.');
    }

    $bookings = [];

    foreach ($cart as $item) {
        if (!isset($item['service_id'])) {
            return redirect('/cart')->with('error', 'Service ID missing.');
        }

        $service = Service::find($item['service_id']);
        if (!$service) {
            return redirect('/cart')->with('error', 'Service not found.');
        }

        $bookings[] = Booking::create([
            'user_id' => $user->id,
            'service_id' => $service->id,
            'service_name' => $item['service_name'],
            'quantity' => $item['quantity'],
            'total_price' => $item['total'],
            'booking_date' => $item['date'],
            'payment_method' => $request->payment_method,
            'status' => 'confirmed',
            'payment_id' => $request->razorpay_payment_id ?? null,
        ]);
    }

    // Send confirmation email with booking summary
    Mail::to($user->email)->send(new BookingConfirmation($user, $bookings));

    // Clear the cart
    session()->forget('cart');

    return redirect('/')->with('success', 'Booking confirmed! Check your email for details.');
}
}