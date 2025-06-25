@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h3 class="fw-bold mb-4">{{ $serviceTitle }}</h3>

    @foreach ($serviceGroups as $groupTitle => $groupServices)
        <h5 class="fw-semibold mt-4">{{ $groupTitle }}</h5>
        <div class="row">
            @foreach ($groupServices as $item)
    <div class="col-md-4 mb-4">
        <div class="card service-card shadow-sm h-100 border-0 animate__animated animate__fadeInUp">
            <img src="{{ asset('images/icons/' . $item['image']) }}" class="card-img-top" alt="{{ $item['label'] }}">
            <div class="card-body">
                <h6 class="card-title">{{ $item['label'] }} – ₹{{ $item['price'] }}</h6>
                {{-- ✅ Use REAL INTEGER ID --}}
                <form method="POST" action="{{ route('cart.add', ['serviceId' => $item['id']]) }}">
    @csrf
    <input type="hidden" name="label" value="{{ $item['label'] }}">
    <input type="hidden" name="price" value="{{ $item['price'] }}">
    <input type="hidden" name="image" value="{{ $item['image'] }}">
    <input type="hidden" name="date" value="{{ now()->toDateString() }}">
    <input type="hidden" name="service_id" value="{{ $item['id'] }}"> {{-- Important for AJAX --}}
    <button type="submit" class="btn btn-primary w-100 mt-2">Book Now</button>
</form>

            </div>
        </div>
    </div>
@endforeach

        </div>
    @endforeach
</div>
@endsection

@push('scripts')
<script>
    document.querySelectorAll('.cart-form').forEach(form => {
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(this);
            const serviceId = formData.get('service_id');

            fetch("{{ url('cart/add') }}/" + serviceId, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector('meta[name=\"csrf-token\"]').content
                },
                body: formData
            })
            .then(res => {
                if (!res.ok) throw new Error('Network response was not OK');
                return res.json();
            })
            .then(data => {
                if (data.success) {
                    const modal = new bootstrap.Modal(document.getElementById('cartPopup'));
                    modal.show();
                }
            })
            .catch(err => {
                alert("Failed to add to cart. Try again.");
                console.error(err);
            });
        });
    });
</script>
@endpush
