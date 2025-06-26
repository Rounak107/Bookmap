<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('user')->latest()->get();
        return view('dashboard', compact('bookings'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->status = $request->input('status');
        $booking->save();

        return redirect()->route('admin.bookings')->with('success', 'Booking updated successfully.');
    }

    public function destroy($id)
    {
        $booking = \App\Models\Booking::findOrFail($id);
    $booking->delete();

    return redirect()->route('admin.bookings')->with('success', 'Booking deleted successfully.');
}
}

