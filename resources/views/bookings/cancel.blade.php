@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card border-danger">
        <div class="card-header bg-danger text-white">
            <h2>Booking Cancelled</h2>
        </div>
        <div class="card-body">
            <div class="alert alert-danger">
                <h3>Payment was cancelled</h3>
                <p>Your booking for {{ $booking->service->name }} was not completed.</p>
                <p>Date: {{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y h:i A') }}</p>
            </div>
            <a href="{{ route('bookings.create', $booking->service) }}" class="btn btn-primary">
                Try Again
            </a>
        </div>
    </div>
</div>
@endsection