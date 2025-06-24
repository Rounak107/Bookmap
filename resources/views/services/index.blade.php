@extends('layouts.app')

@section('content')
<div class="container py-5">

    {{-- Header --}}
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Available Services</h1>
        <p class="lead text-muted">Book professional home services with just a few clicks</p>
        <div class="d-flex justify-content-center gap-3 flex-wrap">
            <span class="badge bg-light text-dark py-2 px-3 fs-6">
                <i class="fas fa-check-circle text-success me-2"></i> Verified Professionals
            </span>
            <span class="badge bg-light text-dark py-2 px-3 fs-6">
                <i class="fas fa-shield-alt text-primary me-2"></i> 100% Quality Assurance
            </span>
            <span class="badge bg-light text-dark py-2 px-3 fs-6">
                <i class="fas fa-rupee-sign text-info me-2"></i> Transparent Pricing
            </span>
        </div>
    </div>

    {{-- Service Cards Grid --}}
    <div class="row g-4">
        @foreach($services as $service)
    <div class="card mb-3">
        <div class="card-body">
            <h5>{{ $service->name }}</h5>
            <p>{{ Str::limit($service->description, 80) }}</p>
            <p><strong>Price: ₹{{ $service->price }}</strong></p>
            <a href="{{ route('services.show', $service->slug) }}" class="btn btn-primary">
                View Details
            </a>
        </div>
    </div>
@endforeach

    </div>

    {{-- Why Choose Us --}}
    <div class="bg-light p-5 rounded mt-5 shadow-sm">
        <div class="row align-items-center">
            <div class="col-md-6 mb-4 mb-md-0">
                <h2 class="fw-bold">Why Choose BokMap?</h2>
                <p class="text-muted">We're revolutionizing home services in Kolkata</p>

                <ul class="list-unstyled">
                    <li class="mb-3 d-flex align-items-start">
                        <i class="fas fa-check-circle text-success me-3 mt-1"></i>
                        <div>
                            <h6 class="fw-semibold mb-1">Verified Professionals</h6>
                            <p class="text-muted mb-0">All our partners are background-verified & trained.</p>
                        </div>
                    </li>
                    <li class="mb-3 d-flex align-items-start">
                        <i class="fas fa-bolt text-warning me-3 mt-1"></i>
                        <div>
                            <h6 class="fw-semibold mb-1">Quick Booking</h6>
                            <p class="text-muted mb-0">Instant scheduling at your convenience.</p>
                        </div>
                    </li>
                    <li class="d-flex align-items-start">
                        <i class="fas fa-thumbs-up text-primary me-3 mt-1"></i>
                        <div>
                            <h6 class="fw-semibold mb-1">Satisfaction Guaranteed</h6>
                            <p class="text-muted mb-0">Free rework if you're not satisfied.</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col-md-6 text-center">
                <img src="https://via.placeholder.com/450x300?text=Trusted+Professionals" class="img-fluid rounded shadow" alt="Professional Service">
            </div>
        </div>
    </div>
</div>
@endsection
