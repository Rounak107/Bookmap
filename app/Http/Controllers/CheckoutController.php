<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log; 
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
    $user = auth()->user();
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
    }

    foreach ($cart as $item) {
        \Log::info("Booking item", $item); // Debugging

        if (empty($item['service_id'])) {
            \Log::error('Missing service_id in cart item.');
            continue;
        }

        $serviceId = $item['service_id']; // ✅ Use real ID
        $service = Service::find($serviceId);

        if (!$service) {
            \Log::error("Service not found: ID $serviceId");
            continue;
        }

        Booking::create([
            'user_id'        => $user->id,
            'service_id'     => $serviceId,
            'service_name'   => $item['service_name'] ?? $service->name,
            'quantity'       => $item['quantity'] ?? 1,
            'total_price'    => $item['total'] ?? $service->price,
            'booking_date'   => $item['date'] ?? now(),
            'payment_method' => $request->payment_method ?? 'cod',
            'status'         => 'confirmed',
        ]);
    }

    session()->forget('cart');
    session()->save();

    return redirect('/')->with('success', 'Your booking has been successfully placed!');
}
}