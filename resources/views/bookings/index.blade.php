@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Your Bookings</h1>
        <a href="{{ route('home') }}" class="btn btn-outline-primary">
            <i class="fas fa-plus me-1"></i> Book New Service
        </a>
    </div>

    @if($bookings->isEmpty())
        <div class="card">
            <div class="card-body text-center py-5">
                <i class="fas fa-calendar-times fa-3x text-muted mb-3"></i>
                <h3>No Bookings Yet</h3>
                <p class="text-muted">You haven't made any bookings yet. Book your first service now!</p>
                <a href="{{ route('home') }}" class="btn btn-primary mt-3">Browse Services</a>
            </div>
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Reference</th>
                        <th>Service</th>
                        <th>Date & Time</th>
                        <th>Professional</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                    <tr>
                        <td>
                            <span class="badge bg-light text-dark">#{{ $booking->booking_reference }}</span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="bg-light p-2 rounded me-2">
                                    <i class="fas fa-tools fa-lg text-primary"></i>
                                </div>
                                <div>
                                    <strong>{{ $booking->service->name }}</strong>
                                    <div class="text-muted small">₹{{ number_format($booking->service->price, 2) }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            {{ Carbon::parse($booking->booking_date)->format('d M Y') }}<br>
                            <span class="text-muted small">{{ Carbon::parse($booking->booking_date)->format('h:i A') }}</span>
                        </td>
                        <td>
                            @if($booking->professional)
                                {{ $booking->professional->name }}
                            @else
                                <span class="text-muted">To be assigned</span>
                            @endif
                        </td>
                        <td>
                            <span class="badge bg-{{ 
                                $booking->status == 'confirmed' ? 'success' : 
                                ($booking->status == 'pending' ? 'warning' : 
                                ($booking->status == 'completed' ? 'primary' : 'danger')) 
                            }}">
                                {{ ucfirst($booking->status) }}
                            </span>
                        </td>
                        <td>
                            <a href="#" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye"></i> View
                            </a>
                            @if($booking->status == 'confirmed')
                                <button class="btn btn-sm btn-outline-danger">
                                    <i class="fas fa-times"></i> Cancel
                                </button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection