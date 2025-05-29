{{-- home.blade.php --}}
@section('content')
<div class="hero-section bg-primary text-white py-5">
    <div class="container py-5">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="display-4 fw-bold">Home Services On Demand</h1>
                <p class="lead">Verified professionals at your doorstep in Kolkata</p>
                <a href="{{ route('services.index') }}" class="btn btn-light btn-lg mt-3">Book Now</a>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('images/hero-image.png') }}" alt="Service Professionals" class="img-fluid rounded shadow">
            </div>
        </div>
    </div>
</div>

<!-- Service Categories Section -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center mb-5">Popular Services</h2>
        <div class="row g-4">
            @foreach($services as $service)
            <div class="col-lg-3 col-md-6">
                <div class="card h-100 border-0 shadow hover-shadow-lg transition-all">
                    <img src="{{ asset($service->image) }}" class="card-img-top" alt="{{ $service->name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $service->name }}</h5>
                        <p class="card-text text-muted">{{ Str::limit($service->description, 80) }}</p>
                    </div>
                    <div class="card-footer bg-white border-0">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="h5 text-primary mb-0">₹{{ $service->price }}</span>
                            <a href="{{ route('bookings.create', $service) }}" 
                               class="btn btn-sm btn-outline-primary">
                                Book Now
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>