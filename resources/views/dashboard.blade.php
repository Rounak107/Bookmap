@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3 class="fw-bold mb-4">Admin - Booking Management Panel</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="d-flex justify-content-end gap-2 mb-3">
        {{-- ✅ Admin Dashboard Button --}}
        <a href="{{ route('admin.dashboard') }}" class="btn btn-primary me-2">
            Admin Login
        </a>

        {{-- Logout Button --}}
        <form method="POST" action="{{ route('admin.logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Service</th>
                <th>Quantity</th>
                <th>Total Price (₹)</th>
                <th>GST (18%)</th>
                <th>Grand Total (₹)</th>
                <th>Location</th>
                <th>Booking Date</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Update</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>
                        {{ $booking->user->name ?? 'Unknown' }}<br>
                        <small>{{ $booking->user->email ?? '' }}</small><br>
                        <small><strong>{{ $booking->user->phone ?? 'No Phone' }}</strong></small>
                    </td>
                    <td>{{ $booking->service_name }}</td>
                    <td>{{ $booking->quantity }}</td>
                    <td>₹{{ number_format($booking->total_price, 2) }}</td>
                    <td>₹{{ number_format($booking->tax_amount ?? 0, 2) }}</td>
                    <td>₹{{ number_format($booking->grand_total ?? ($booking->total_price + ($booking->tax_amount ?? 0)), 2) }}</td>
                    <td>{{ $booking->location ?? 'N/A' }}</td>
                    <td>{{ $booking->booking_date }}</td>
                    <td>{{ strtoupper($booking->payment_method) }}</td>
                    <td>
                        <form method="POST" action="{{ url('/admin/bookings/rounakbhuiya/'.$booking->id.'/update') }}">
                            @csrf
                            <select name="status" class="form-select form-select-sm">
                                <option {{ $booking->status == 'confirmed' ? 'selected' : '' }}>confirmed</option>
                                <option {{ $booking->status == 'completed' ? 'selected' : '' }}>completed</option>
                                <option {{ $booking->status == 'cancelled' ? 'selected' : '' }}>cancelled</option>
                            </select>
                            <button type="submit" class="btn btn-sm btn-primary mt-1">Update</button>
                        </form>
                    </td>
                    <td>{{ $booking->created_at }}</td>
                    <td>{{ $booking->updated_at }}</td>
                    <td>
                        <form method="POST" action="{{ url('/admin/bookings/rounakbhuiya/'.$booking->id) }}" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
