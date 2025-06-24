@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h2 class="fw-bold mb-4">Confirm Your Booking</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if(empty($cart))
        <div class="alert alert-info">Your cart is empty. <a href="{{ route('home') }}">Browse services</a></div>
    @else
        <div class="table-responsive">
            <table class="table align-middle">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Service</th>
                        <th>Qty</th>
                        <th>Date</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                        <tr>
                            <td><img src="{{ asset('images/icons/' . $item['image']) }}" width="60" alt=""></td>
                            <td>{{ $item['service_name'] }}</td>
                            <td>{{ $item['quantity'] }}</td>
                            <td>{{ $item['date'] }}</td>
                            <td>₹{{ $item['total'] }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <h4 class="mt-3">Total: ₹{{ $total }}</h4>

        <!-- 📌 BOOK Button only -->
        <form id="cod-form" action="{{ route('checkout.confirm') }}" method="POST" class="mt-4">
    @csrf
    <input type="hidden" name="payment_method" value="cod">
    <button type="submit" class="btn btn-success">Book</button>
</form>

    @endif
</div>
@endsection
