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

        <!-- Payment Method Dropdown -->
<div class="mt-4">
    <label>Select Payment Method:</label>
    <select id="payment-method" class="form-select w-auto mt-2">
        <option value="cod" selected>Cash on Service</option>
        <option value="razorpay"> Razorpay</option>
    </select>
</div>

<!-- Confirm & Pay Buttons (Moved Below) -->
<form id="cod-form" action="{{ route('checkout.confirm') }}" method="POST" class="mt-4">
    @csrf
    <input type="hidden" name="payment_method" value="cod">
    <button type="submit" class="btn btn-success">Confirm & Pay on Service</button>
</form>

<form id="razor-form" action="{{ route('checkout.confirm') }}" method="POST" class="mt-4 d-none">
    @csrf
    <input type="hidden" name="payment_method" value="razorpay">
    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
</form>

<button id="pay-button" class="btn btn-primary d-none mt-2">Pay Now with Razorpay</button>

    @endif
</div>
@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    // Pass values from Laravel to JavaScript
    const razorpayKey = "{{ env('RAZORPAY_KEY') }}";
    const amount = {{ $total * 100 }}; // Razorpay takes amount in paise
    const user = {
        name: "{{ $user->name ?? '' }}",   // ✅ fallback added
        email: "{{ $user->email ?? '' }}"
    };

    const payBtn = document.getElementById('pay-button');
    const methodSelect = document.getElementById('payment-method');
    const codForm = document.getElementById('cod-form');
    const razorForm = document.getElementById('razor-form');

    methodSelect.addEventListener('change', function () {
        if (this.value === 'cod') {
            codForm.classList.remove('d-none');
            payBtn.classList.add('d-none');
        } else if (this.value === 'razorpay') {
            codForm.classList.add('d-none');
            payBtn.classList.remove('d-none');
        }
    });

    payBtn.addEventListener('click', function () {
        const options = {
            key: razorpayKey,
            amount: amount,
            currency: "INR",
            name: "BokMap Services",
            description: "Service Booking Payment",
            handler: function (response) {
                document.getElementById('razorpay_payment_id').value = response.razorpay_payment_id;
                razorForm.submit(); // submit the hidden form with the payment ID
            },
            prefill: user,
            theme: {
                color: "#28a745"
            }
        };

        const razorpay = new Razorpay(options);
        razorpay.open();
    });
</script>
@endpush
