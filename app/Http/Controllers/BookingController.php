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

    public function store(Request $request, Service $service)
    {
        $request->validate([
            'booking_date' => 'required|date',
            'booking_time' => 'required',
        ]);

        $bookingDate = $request->booking_date . ' ' . $request->booking_time;
        
        $booking = Booking::create([
            'user_id' => auth()->id(),
            'service_id' => $service->id,
            'booking_date' => $bookingDate,
            'status' => 'confirmed',
            'booking_reference' => 'BKM-' . Str::upper(Str::random(6)),
        ]);

        return redirect()->route('bookings.success', $booking);
    }

    public function success(Booking $booking)
    {
        return view('bookings.success', compact('booking'));
    }
}