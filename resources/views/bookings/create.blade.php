@extends('layouts.app')

@section('content')
<div class="booking-steps mb-4">
    <div class="steps">
        <div class="step active">1. Choose Time</div>
        <div class="step">2. Confirm Details</div>
        <div class="step">3. Payment</div>
    </div>
</div>

<div class="card border-0 shadow">
    <div class="card-body p-4">
        <div class="d-flex mb-4">
            <img src="{{ asset($service->image) }}" 
                 alt="{{ $service->name }}" 
                 class="rounded me-4" 
                 width="100">
            <div>
                <h3 class="mb-1">{{ $service->name }}</h3>
                <p class="text-muted mb-2">{{ $service->description }}</p>
                <h4 class="text-primary">₹{{ number_format($service->price, 2) }}</h4>
            </div>
        </div>
        
        <form method="POST" action="{{ route('bookings.store', $service) }}">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <!-- Date/Time pickers -->
                </div>
                <div class="col-md-6">
                    <div class="card bg-light border-0">
                        <div class="card-body">
                            <h5>Booking Summary</h5>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item bg-light d-flex justify-content-between">
                                    <span>Service:</span>
                                    <span>{{ $service->name }}</span>
                                </li>
                                <li class="list-group-item bg-light d-flex justify-content-between">
                                    <span>Price:</span>
                                    <span>₹{{ $service->price }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection