@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3 class="fw-bold mb-4">Admin - Booking Management Panel</h3>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>User</th>
                <th>Service</th>
                <th>Quantity</th>
                <th>Total Price</th>
                <th>Booking Date</th>
                <th>Payment</th>
                <th>Status</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Update</th>
                <th>Delete</th>
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
                <td>₹{{ $booking->total_price }}</td>
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
