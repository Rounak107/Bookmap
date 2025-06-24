<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = auth()->user()->bookings()->with('service')->latest()->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create(Service $service)
    {
        return view('bookings.create', compact('service'));
    }

        public function store(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'date' => 'required|date|after_or_equal:today',
            'address' => 'required|string|max:255',
        ]);

        Booking::create([
            'user_id' => auth()->id(), // if using auth
            'service_id' => $validated['service_id'],
            'date' => $validated['date'],
            'address' => $validated['address'],
        ]);

        return redirect()->route('services.index')->with('success', 'Booking placed successfully!');
    }

    public function success(Booking $booking)
    {
        return view('bookings.success', compact('booking'));
    }
}