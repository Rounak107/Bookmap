<nav class="navbar navbar-expand-lg navbar-dark bg-black px-4 py-3">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center text-white fw-bold fs-4" href="{{ url('/') }}">
            <img src="{{ asset('images/icons/Bokmap-Logo.jpg') }}" alt=" " width="40" height="40" class="me-2 square">
            BokMap Services
        </a>

        <!-- Cart Icon - Always Visible (even in mobile) -->
        <div class="d-lg-none d-flex align-items-center ms-auto me-2">
            <a href="{{ route('cart.index') }}" class="text-white position-relative fs-5">
                <i class="fas fa-shopping-cart"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cart-count">
                    {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}
                </span>
            </a>
        </div>

        <!-- Toggle for Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarBokmap">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Collapsible Menu -->
        <div class="collapse navbar-collapse" id="navbarBokmap">
            <!-- Right Side -->
            <div class="d-lg-flex justify-content-lg-end align-items-lg-center w-100 gap-5 mt-4 mt-lg-0">

                <!-- Search Bars -->
                <form class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3" role="search">
                    <!-- Location -->
                    <div class="input-group input-group-md" style="min-width: 200px;">
                        <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt fa-lg"></i></span>
                        <input type="text" class="form-control fs-6" placeholder="Location" id="location-input" autocomplete="off">
                    </div>

                    <!-- Service -->
                    <div class="input-group input-group-md" style="min-width: 240px;">
                        <span class="input-group-text bg-white"><i class="fas fa-search fa-lg"></i></span>
                        <input type="text" class="form-control fs-6" placeholder="Search" id="service-input" autocomplete="off">
                    </div>
                </form>

                <!-- Cart Icon for Desktop Only -->
                <div class="d-none d-lg-block position-relative">
                    <a href="{{ route('cart.index') }}" class="text-white position-relative fs-5">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cart-count">
                            {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}
                        </span>
                    </a>
                </div>

                <!-- Auth Buttons -->
                <div>
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="d-inline">
                            @csrf
                            <button type="submit" class="btn btn-outline-light btn-md">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-light btn-md">Login</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</nav>
