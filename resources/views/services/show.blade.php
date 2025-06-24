@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-body">
            <h2 class="card-title">{{ $service->name }}</h2>
            <p class="card-text">{{ $service->description }}</p>
            <p class="card-text"><strong>Price:</strong> ₹{{ $service->price }}</p>

            @if($service->icon)
                <img src="{{ asset('storage/icons/' . $service->icon) }}" alt="Service Icon" width="100">
            @endif

            <a href="{{ route('booking.create', ['service_id' => $service->id]) }}" class="btn btn-primary mt-3">
                Book Now
            </a>
        </div>
    </div>
</div>
@endsection
