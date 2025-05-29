<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Professional;
use App\Models\Category; // Add this import
use App\Models\Service;  // Add if needed

class ProfessionalController extends Controller
{
        public function assignProfessional(Booking $booking)
    {
        $availablePros = Professional::where('service_type', $booking->service->category)
            ->whereDoesntHave('bookings', function($query) use ($booking) {
                $query->where('booking_date', $booking->booking_date);
            })
            ->get();

        // Fetch categories (adjust if your model has different name)
        $categories = Category::all(); 

        return view('bookings.assign', compact('booking', 'availablePros', 'categories'));
    }
}