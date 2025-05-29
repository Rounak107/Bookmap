@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="text-center mb-5">
        <h1 class="display-5 fw-bold">Available Services</h1>
        <p class="lead text-muted">Book professional home services with just a few clicks</p>
        <div class="d-flex justify-content-center gap-2">
            <div class="badge bg-light text-dark p-2"><i class="fas fa-check-circle text-success me-1"></i> Verified Professionals</div>
            <div class="badge bg-light text-dark p-2"><i class="fas fa-shield-alt text-primary me-1"></i> 100% Quality Assurance</div>
            <div class="badge bg-light text-dark p-2"><i class="fas fa-rupee-sign text-info me-1"></i> Transparent Pricing</div>
        </div>
    </div>

    <div class="row g-4">
        @foreach($services as $service)
        <div class="col-lg-4 col-md-6">
            <div class="card h-100 border-0 shadow-sm hover-shadow">
                <div class="card-header bg-white border-0 pt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">{{ $service->name }}</h4>
                        <span class="badge bg-primary-light text-primary rounded-pill">Popular</span>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center mb-4">
                        <div class="icon-lg bg-primary-light text-primary rounded-circle mb-3 mx-auto">
                            <i class="fas {{ $service->name == 'Plumbing' ? 'fa-faucet' : ($service->name == 'Cleaning' ? 'fa-broom' : 'fa-tools') }}"></i>
                        </div>
                        <p class="card-text text-muted">{{ $service->description }}</p>
                    </div>
                    
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-clock text-muted me-2"></i> Duration</span>
                            <span>1-2 hours</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-calendar-check text-muted me-2"></i> Availability</span>
                            <span>Today</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <span><i class="fas fa-shield-alt text-muted me-2"></i> Warranty</span>
                            <span>30 days</span>
                        </li>
                    </ul>
                    
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <h3 class="mb-0">₹{{ number_format($service->price, 2) }}</h3>
                        <a href="{{ route('bookings.create', $service) }}" class="btn btn-primary">
                            <i class="fas fa-calendar-plus me-1"></i> Book Now
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="card border-0 shadow-sm mt-5">
        <div class="card-body p-5">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Why Choose BokMap?</h2>
                    <p class="lead">We're revolutionizing home services in Kolkata</p>
                    
                    <div class="d-flex mb-3">
                        <div class="icon-md bg-success-light text-success rounded-circle me-3">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">Verified Professionals</h5>
                            <p class="text-muted mb-0">All service providers are background-checked and trained</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-3">
                        <div class="icon-md bg-success-light text-success rounded-circle me-3">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">Instant Booking</h5>
                            <p class="text-muted mb-0">Book services in under 30 seconds</p>
                        </div>
                    </div>
                    
                    <div class="d-flex mb-3">
                        <div class="icon-md bg-success-light text-success rounded-circle me-3">
                            <i class="fas fa-check"></i>
                        </div>
                        <div>
                            <h5 class="mb-1">100% Satisfaction Guarantee</h5>
                            <p class="text-muted mb-0">We'll redo the service if you're not happy</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 text-center">
                    <img src="https://via.placeholder.com/400" alt="Service Professional" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection