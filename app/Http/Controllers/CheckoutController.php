<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Service;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Your cart is empty!');
        }

        $total = collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']);
        $user = auth()->user();

        return view('checkout', compact('cart', 'total', 'user'));
    }

    public function confirmBooking(Request $request)
{
    $request->validate([
        'location' => 'required|string|max:255'
    ]);

    $user = auth()->user();
    $cart = session()->get('cart', []);

    if (empty($cart)) {
        return redirect()->route('cart.index')->with('error', 'Your cart is empty.');
    }

    $taxPercentage = 18.00; // 💡 You can make this dynamic later from admin panel or config

    foreach ($cart as $item) {
        $service = Service::find($item['service_id']);
        if (!$service) continue;

        $quantity = $item['quantity'] ?? 1;
        $totalPrice = $item['total'] ?? $service->price * $quantity;
        $taxAmount = round(($totalPrice * $taxPercentage) / 100, 2);
        $grandTotal = $totalPrice + $taxAmount;

        Booking::create([
            'user_id' => $user->id,
            'service_id' => $item['service_id'],
            'service_name' => $item['service_name'] ?? $service->name,
            'quantity' => $quantity,
            'total_price' => $totalPrice,
            'tax_percentage' => $taxPercentage,
            'tax_amount' => $taxAmount,
            'grand_total' => $grandTotal,
            'booking_date' => $item['date'] ?? now(),
            'payment_method' => $request->payment_method ?? 'cod',
            'location' => $request->location,
            'status' => 'confirmed',
        ]);
    }

    session()->forget('cart');

    return redirect('/')->with('success', 'Your booking has been successfully placed!');
}
}
