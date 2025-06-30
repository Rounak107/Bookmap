@php use Illuminate\Support\Str; @endphp

@extends('layouts.app')

@section('content')
<div class="container py-4">

@if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

    {{-- ✅ 1. Carousel Banner with Arrows & Overlay Header --}}
    <div class="position-relative mb-5" data-aos="fade-down">
        <div id="homepageCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" style="height: 280px; border-radius: 10px; overflow: hidden;">
                <div class="carousel-item active">
                    <img src="{{ asset('images/banner1.jpeg') }}" class="d-block w-100" style="height: 280px; object-fit: cover;" alt="Banner 1">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner2.jpeg') }}" class="d-block w-100" style="height: 280px; object-fit: cover;" alt="Banner 2">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('images/banner3.jpeg') }}" class="d-block w-100" style="height: 280px; object-fit: cover;" alt="Banner 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#homepageCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark rounded-circle p-2"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#homepageCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark rounded-circle p-2"></span>
            </button>
        </div>

        {{-- Overlay Header --}}
        <div class="position-absolute top-0 start-50 translate-middle-x text-center text-white" style="z-index: 10; width: 100%; padding-top: 110px;">
            <h1 class="display-5 fw-bold text-shadow">Available Services</h1>
            <p class="lead">Book professional home services with just a few clicks</p>
            <div class="d-flex justify-content-center gap-3 flex-wrap">
                <span class="badge bg-light text-dark py-2 px-3 fs-6"><i class="fas fa-check-circle text-success me-2"></i> Verified Professionals</span>
                <span class="badge bg-light text-dark py-2 px-3 fs-6"><i class="fas fa-shield-alt text-primary me-2"></i> 100% Quality Assurance</span>
                <span class="badge bg-light text-dark py-2 px-3 fs-6"><i class="fas fa-rupee-sign text-info me-2"></i> Transparent Pricing</span>
            </div>
        </div>
    </div>

    {{-- ✅ 2. Horizontal Category Bar with Dropdowns --}}
    <div class="bg-white shadow-sm py-3 mb-4 rounded sticky-top" style="z-index: 1000;">
        <div class="d-flex justify-content-center gap-4 flex-wrap">
            @php
                $categories = [
                   ['name' => 'Home Services', 'icon' => 'fas fa-home', 'id' => 'home', 'subs' => ['AC Repair', 'Carpentry', 'Electrician']],
                   ['name' => 'Kitchen', 'icon' => 'fas fa-utensils', 'id' => 'kitchen', 'subs' => ['Refrigerator', 'Microwave', 'Chimney']],
                   ['name' => 'Home Interior', 'icon' => 'fas fa-couch', 'id' => 'interior', 'subs' => ['Wallpaper', 'False Ceiling', 'Wall Paint']],
                   ['name' => 'Cleaning', 'icon' => 'fas fa-broom', 'id' => 'cleaning', 'subs' => ['Sofa Cleaning', 'Bathroom Cleaning']],
                   ['name' => 'Pest Control', 'icon' => 'fas fa-bug', 'id' => 'pest', 'subs' => []],
                   ['name' => 'Plumber', 'icon' => 'fas fa-wrench', 'id' => 'plumber', 'subs' => []],
                   ['name' => 'Painting', 'icon' => 'fas fa-paint-roller', 'id' => 'painting', 'subs' => []],
                ];
            @endphp

            @foreach ($categories as $cat)
                <div class="dropdown text-center">
                    <a href="#{{ $cat['id'] }}" class="text-decoration-none text-dark">
                        <div class="icon-md bg-light rounded-circle mb-1 mx-auto shadow-sm">
                            <i class="{{ $cat['icon'] }} text-primary"></i>
                        </div>
                        <small>{{ $cat['name'] }}</small>
                    </a>
                    @if (count($cat['subs']))
                    <div class="dropdown-menu p-2 text-start animate__animated animate__fadeIn">
                        @foreach ($cat['subs'] as $sub)
                            <a href="#" class="dropdown-item small">{{ $sub }}</a>
                        @endforeach
                    </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>

    {{-- ✅ 4. Home Services --}}
    <h2 id="home" class="fw-bold fs-3 mb-4">Home Services</h2>
    <div class="row" id="homeServices">
        @foreach ($homeServices as $service)
            <div class="col-md-3 mb-4 service-card">
                <a href="{{ route('service.details', ['slug' => $service->slug]) }}" class="text-decoration-none text-dark">
                    <div class="card shadow-sm h-100">
                        <img src="{{ asset('images/icons/' . $service->icon) }}" alt="{{ $service->name }}" class="card-img-top" style="height: 180px; object-fit: contain; margin-top: 20px;">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $service->name }}</h5>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>

    {{-- ✅ 5. Kitchen Services --}}
<h2 id="kitchen" class="fw-bold fs-3 mb-4">Kitchen Services</h2>
<div class="row" id="kitchenServices">
    @foreach ($kitchenServices as $service)
        <div class="col-md-3 col-6 mb-4">
            <a href="{{ route('service.details', ['slug' => $service->slug]) }}" class="text-decoration-none text-dark">
                <div class="card shadow-sm hover-scale h-100 text-center p-3">
                    <img src="{{ asset('images/icons/' . $service->icon) }}" alt="{{ $service->name }}"
                         class="img-fluid mx-auto" style="height: 150px; object-fit: contain;">
                    <p class="fw-semibold mt-3">{{ $service->name }}</p>
                </div>
            </a>
        </div>
    @endforeach
</div>



    {{-- ✅ 6. Home Interior Services --}}
<h2 id="interior" class="fw-bold fs-3 mb-4">Home Interior Services</h2>
<div class="row" id="interiorServices">
    @php
    $interiorServices = [
        ['name' => 'Home Interior', 'icon' => 'interior-design.jfif', 'slug' => 'interior-design-consultation'],
        ['name' => 'False Ceiling', 'icon' => 'false-ceiling.jfif', 'slug' => 'false-ceiling-setup'],
        ['name' => ' Wall Painting', 'icon' => 'texture-wall.jfif', 'slug' => 'texture-wall-painting'],
        ['name' => 'Interior Wall Painting', 'icon' => 'wall-painting.jfif', 'slug' => 'interior-wall-painting'],
        ['name' => 'Designer Wallpaper Installation', 'icon' => 'wallpaper.jfif', 'slug' => 'wallpaper-installation'],
        ['name' => 'Custom Interior Wall Printing', 'icon' => 'wall-printing.jfif', 'slug' => 'wall-printing'],
        ['name' => 'Kids Room Cartoon Wall Painting', 'icon' => 'kids-wall-painting.jfif', 'slug' => 'kids-wall-painting'],
    ];
@endphp

@foreach ($interiorServices as $service)
    <div class="col-md-3 col-6 mb-4 service-card">
        <a href="{{ route('service.details', ['slug' => $service['slug']]) }}" class="text-decoration-none text-dark">
            <div class="card shadow-sm h-100 hover-scale">
                <img src="{{ asset('images/icons/' . $service['icon']) }}" alt="{{ $service['name'] }}" class="card-img-top" style="height: 180px; object-fit: contain;">
                <div class="card-body p-2 text-center">
                    <p class="card-text fw-semibold">{{ $service['name'] }}</p>
                </div>
            </div>
        </a>
    </div>
@endforeach
</div>
</div>

{{-- ✅ 7. Why Choose Us --}}
    <div class="bg-light p-5 rounded mt-5 shadow-sm text-center">
        <h2 class="fw-bold mb-3">Why Choose BokMap?</h2>
        <p class="text-muted">We're revolutionizing home services in Kolkata</p>
        <div class="row justify-content-center mt-4">
            <div class="col-md-4 mb-3">
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <i class="fas fa-check-circle text-success fs-4"></i>
                    <div>
                        <h6 class="fw-semibold mb-1">Verified Professionals</h6>
                        <p class="text-muted mb-0">All partners are background-verified & trained.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <i class="fas fa-bolt text-warning fs-4"></i>
                    <div>
                        <h6 class="fw-semibold mb-1">Quick Booking</h6>
                        <p class="text-muted mb-0">Instant scheduling at your convenience.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="d-flex align-items-center justify-content-center gap-3">
                    <i class="fas fa-thumbs-up text-primary fs-4"></i>
                    <div>
                        <h6 class="fw-semibold mb-1">Satisfaction Guaranteed</h6>
                        <p class="text-muted mb-0">Free rework if you're not satisfied.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{-- ✅ 8. Filter Script --}}
@push('scripts')
<script>
    document.getElementById('filterInput').addEventListener('keyup', function () {
        let query = this.value.toLowerCase();
        document.querySelectorAll('.service-card').forEach(function (el) {
            let text = el.innerText.toLowerCase();
            el.style.display = text.includes(query) ? 'block' : 'none';
        });
    });
</script>
@endpush
@endsection
