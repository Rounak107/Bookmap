@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card border-success">
        <div class="card-header bg-success text-white">
            <h2>Booking Confirmed!</h2>
        </div>
        <div class="card-body">
            <div class="alert alert-success">
                <h3>Thank You for Your Booking</h3>
                <p><strong>Service:</strong> {{ $booking->service->name }}</p>
                <p><strong>Date & Time:</strong> {{ Carbon::parse($booking->booking_date)->format('d M Y, h:i A') }}</p>
                <p><strong>Booking Reference:</strong> {{ $booking->booking_reference }}</p>
                <p><strong>Professional:</strong> Will be assigned soon</p>
                <p><strong>Contact:</strong> +91 98765 43210 (Customer Support)</p>
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ route('bookings.index') }}" class="btn btn-outline-primary">
                    <i class="fas fa-calendar me-1"></i> View All Bookings
                </a>
                <a href="{{ route('home') }}" class="btn btn-primary">
                    <i class="fas fa-home me-1"></i> Back to Home
                </a>
            </div>
        </div>
    </div>
</div>
@endsection