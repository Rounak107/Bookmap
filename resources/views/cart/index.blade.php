@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h2 class="mb-4"><i class="fas fa-shopping-cart me-2"></i>Your Cart</h2>

    @php
        $cartItems = session('cart', []);
        $cartTotal = collect($cartItems)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
    @endphp

    @if(count($cartItems) > 0)
        <div class="table-responsive shadow-sm border rounded">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>Image</th>
                        <th>Service</th>
                        <th>Price</th>
                        <th>Date</th>
                        <th>Quantity</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cartItems as $id => $item)
                        <tr id="row-{{ $id }}">
                            <td style="max-width: 100px;">
                                <img src="{{ asset('images/icons/' . $item['image']) }}" class="img-fluid rounded" style="height: 60px;">
                            </td>
                            <td><strong>{{ $item['service_name'] }}</strong></td>
                            <td id="price-{{ $id }}">₹{{ $item['total'] }}</td>
                            <td>
                                <input type="date" name="date" class="form-control form-control-sm date-picker" data-id="{{ $id }}" value="{{ $item['date'] }}">
                            </td>
                            <td id="qty-{{ $id }}">{{ $item['quantity'] }}</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <!-- ➕ Increase -->
                                    <button class="btn btn-success btn-sm increase-btn" data-id="{{ $id }}">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <!-- ➖ Decrease -->
                                    <button class="btn btn-warning btn-sm decrease-btn" data-id="{{ $id }}">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <!-- 🗑 Remove -->
                                    <form method="POST" action="{{ route('cart.remove', $id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- 🧾 Cart Total -->
        <div class="text-end mt-3">
            <h5>Total: ₹<span id="cart-total">{{ $cartTotal }}</span></h5>
        </div>

        <!-- 🚀 Book Now -->
        <a href="{{ route('checkout.index') }}" class="btn btn-primary mt-3 float-end">
            <i class="fas fa-calendar-check me-1"></i> Book Now
        </a>

        <!-- 🧹 Clear Cart -->
        <form method="POST" action="{{ route('cart.clear') }}" class="mt-3">
            @csrf
            <button type="submit" class="btn btn-outline-danger">
                <i class="fas fa-trash-alt me-1"></i>Clear Cart
            </button>
        </form>
    @else
        <div class="alert alert-info mt-4">
            Your cart is currently empty.
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {

        // ✅ Increase Quantity (Event Delegation)
        $(document).on('click', '.increase-btn', function () {
            const id = $(this).data('id');

            $.ajax({
                url: '/cart/increase/' + id,
                type: 'POST',
                data: { _token: '{{ csrf_token() }}' },
                success: function (res) {
                    console.log(res); 
                    
                    if (res.success) {
                        $('#qty-' + id).text(res.item.quantity);
                        $('#price-' + id).text('₹' + res.item.total);
                        $('#cart-count').text(res.count);
                        $('#cart-total').text(res.cartTotal);
                    }
                }
            });
        });

        // ✅ Decrease Quantity (Event Delegation)
        $(document).on('click', '.decrease-btn', function () {
            const id = $(this).data('id');

            $.ajax({
                url: '/cart/decrease/' + id,
                type: 'POST',
                data: { _token: '{{ csrf_token() }}' },
                success: function (res) {
                    if (res.success) {
                        if (res.item.quantity > 0) {
                            $('#qty-' + id).text(res.item.quantity);
                            $('#price-' + id).text('₹' + res.item.total);
                        } else {
                            $('#row-' + id).remove(); // If quantity 0, remove row
                        }
                        $('#cart-count').text(res.count);
                        $('#cart-total').text(res.cartTotal);
                    }
                }
            });
        });


        // ✅ Update Date (Event Delegation)
        $(document).on('change', '.date-picker', function () {
            const id = $(this).data('id');
            const date = $(this).val();

            $.ajax({
                url: '/cart/update-date/' + id,
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    date: date
                },
                success: function (res) {
                    if (res.success) {
                        alert("Date updated successfully.");
                    }
                }
            });
        });

    });
</script>
@endsection

