<nav class="navbar navbar-expand-lg navbar-dark bg-black px-5 py-3">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center text-white fw-bold" href="{{ url('/') }}">
            <i class="fas fa-wrench fa-lg me-2"></i> BokMap
        </a>

        <!-- Navigation Links -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-4">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Kitchen</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Home Interior</a>
            </li>
        </ul>

        <!-- Location & Search Bar -->
        <form class="d-flex me-3" role="search">
            <div class="input-group me-2">
                <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt"></i></span>
                <input type="text" class="form-control" placeholder="Enter your location" id="location-input" autocomplete="off">
            </div>

            <div class="input-group">
                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search for services" id="service-input" autocomplete="off">
            </div>
        </form>

        <!-- Cart and Profile -->
        <li class="nav-item position-relative me-3">
            <a href="{{ route('cart.index') }}" class="text-white me-3 position-relative">
                <i class="fas fa-shopping-cart fa-lg"></i>
                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" id="cart-count">
                    {{ session('cart') ? array_sum(array_column(session('cart'), 'quantity')) : 0 }}
                </span>
            </a>
        </li>



            <!-- Login/Profile Button -->
            @auth
    <form method="POST" action="{{ route('logout') }}" class="d-inline">
        @csrf
        <button type="submit" class="btn btn-outline-light ms-2">Logout</button>
    </form>
@else
    <a href="{{ route('login') }}" class="btn btn-outline-light ms-2">Login</a>
@endauth

        </div>
    </div>
</nav>
