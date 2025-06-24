@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm">
        <div class="card-body">
            <h2 class="mb-4">Book: {{ $service->name }}</h2>

            <form action="{{ route('bookings.store') }}" method="POST">
                @csrf
                <input type="hidden" name="service_id" value="{{ $service->id }}">

                <div class="mb-3">
                    <label for="date" class="form-label">Preferred Date</label>
                    <input type="date" class="form-control" name="date" required>
                </div>

                <div class="mb-3">
                    <label for="address" class="form-label">Service Address</label>
                    <textarea name="address" rows="3" class="form-control" required></textarea>
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle me-1"></i> Confirm Booking
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
