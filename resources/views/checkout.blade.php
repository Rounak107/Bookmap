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

        @php
            $gst = round($total * 0.18, 2);
            $grandTotal = $total + $gst;
        @endphp

        <div class="mt-4 w-50">
            <div class="d-flex justify-content-between border-bottom py-1">
                <span class="fw-semibold">Subtotal</span>
                <span>₹{{ number_format($total, 2) }}</span>
            </div>
            <div class="d-flex justify-content-between border-bottom py-1">
                <span class="fw-semibold">GST (18%)</span>
                <span>₹{{ number_format($gst, 2) }}</span>
            </div>
            <div class="d-flex justify-content-between py-2">
                <h5 class="fw-bold text-success">Total</h5>
                <h5 class="fw-bold text-success">₹{{ number_format($grandTotal, 2) }}</h5>
            </div>
        </div>

        <!-- Location Modal -->
        <div class="modal fade" id="locationModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Select Your Location</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <input type="text" id="location-search" class="form-control mb-3" placeholder="Enter your location manually or choose below...">
                <a href="javascript:void(0);" onclick="useCurrentLocation()" class="d-block mb-2 text-primary">Use current location</a>
                <button type="button" class="btn btn-success mb-3" id="confirmAddressBtn">Confirm Address</button>
                <ul class="list-group" id="location-suggestions" style="max-height: 300px; overflow-y: auto;"></ul>
            </div>
        </div>
    </div>
</div>

<!-- ✅ Booking form -->
<form id="cod-form" action="{{ route('checkout.confirm') }}" method="POST" class="mt-4">
    @csrf
    <div class="mb-3">
        <label class="form-label fw-semibold">Your Location <span class="text-danger">*</span></label>
        <div class="input-group input-group-sm w-50" onclick="openLocationModal()" style="cursor:pointer;">
            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt text-dark"></i></span>
            <input type="text" id="selected-location" class="form-control small-location-input" placeholder="Select your location" readonly required>
            <span class="input-group-text bg-white"><i class="fas fa-chevron-down text-dark"></i></span>
        </div>
        <input type="hidden" name="location" id="location-hidden">
    </div>
    <button type="submit" class="btn btn-success mt-3">Book</button>
</form>
    @endif
</div>
@endsection

@push('scripts')
<script>
const allLocations = [
    'Central Kolkata', 'Park Street', 'Esplanade', 'Ballygunge', 'Alipore', 'Tollygunge',
    'Shyambazar', 'Dum Dum', 'Baranagar', 'Belgachia', 'Cossipore',
    'Gariahat', 'Jadavpur', 'Behala', 'New Alipore', 'Kasba',
    'Salt Lake', 'EM Bypass', 'Tangra', 'Ultadanga', 'Rajarhat',
    'Howrah', 'Shibpur', 'Konnagar', 'Bally', 'Santragachi',
    'Birati', 'Dum Dum Cantonment', 'Nagerbazar', 'Sodepur',
    'Madhyamgram', 'Barasat', 'Kanchrapara', 'Hridaypur',
    'Duttapukur', 'Barrackpore', 'Habra', 'Ashoknagar',
    'Bira', 'Bongaon', 'Gaighata'
];

function openLocationModal() {
    const modal = new bootstrap.Modal(document.getElementById('locationModal'));
    modal.show();
    updateLocationSuggestions(allLocations);
}

function updateLocationSuggestions(locations) {
    const suggestionList = document.getElementById('location-suggestions');
    suggestionList.innerHTML = '';
    if (locations.length === 0) {
        suggestionList.innerHTML = '<li class="list-group-item">No locations found</li>';
        return;
    }

    locations.forEach(location => {
        const li = document.createElement('li');
        li.className = 'list-group-item location-option';
        li.textContent = location;
        li.style.cursor = 'pointer';
        li.onclick = () => selectLocation(location);
        suggestionList.appendChild(li);
    });
}

function selectLocation(location) {
    document.getElementById('selected-location').value = location;
    document.getElementById('location-hidden').value = location;
    bootstrap.Modal.getInstance(document.getElementById('locationModal')).hide();
}

document.getElementById('location-search').addEventListener('input', function () {
    const query = this.value.toLowerCase().trim();
    const filtered = allLocations.filter(loc => loc.toLowerCase().includes(query));
    updateLocationSuggestions(filtered);
});

// ✅ Press Enter to confirm location input
document.getElementById('location-search').addEventListener('keydown', function (e) {
    if (e.key === 'Enter') {
        e.preventDefault();
        document.getElementById('confirmAddressBtn').click();
    }
});

// ✅ Confirm address from manual input
document.getElementById('confirmAddressBtn').addEventListener('click', function () {
    const input = document.getElementById('location-search').value.trim();
    if (input !== '') {
        selectLocation(input);
    } else {
        alert('Please enter a valid location or choose from suggestions.');
    }
});

// ✅ Fetch current location via GPS
function useCurrentLocation() {
    if (!navigator.geolocation) {
        alert('Geolocation not supported by your browser');
        return;
    }

    navigator.geolocation.getCurrentPosition(async (position) => {
        const lat = position.coords.latitude;
        const lon = position.coords.longitude;

        const response = await fetch(`https://nominatim.openstreetmap.org/reverse?lat=${lat}&lon=${lon}&format=json`);
        const data = await response.json();
        const location = data.display_name || `${lat}, ${lon}`;
        selectLocation(location);
    }, () => {
        alert('Unable to fetch your location.');
    });
}
</script>
<style>
.small-location-input {
    font-size: 0.9rem;
    padding: 0.4rem 0.6rem;
}
</style>
@endpush