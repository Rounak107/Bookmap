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
                <form class="d-flex flex-wrap flex-lg-nowrap align-items-center gap-3" onsubmit="return false;">
                    <!-- Location -->
                    <div class="position-relative" style="min-width: 240px;">
                        <div class="input-group input-group-md">
                            <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt fa-lg"></i></span>
                            <input type="text" class="form-control fs-6 rounded-end" placeholder="Enter Location (Kolkata)" id="location-input" autocomplete="off">
                        </div>
                        <ul class="dropdown-menu w-100 shadow-lg rounded mt-1" id="location-suggestions"></ul>
                    </div>

                    <!-- Service Autocomplete Input -->
                    <div class="position-relative" style="min-width: 240px;">
                        <div class="input-group input-group-md">
                            <span class="input-group-text bg-white"><i class="fas fa-search fa-lg"></i></span>
                            <input type="text" class="form-control fs-6" placeholder="Search for services" id="service-input" autocomplete="off">
                        </div>
                        <ul id="service-suggestions" class="dropdown-menu w-100 shadow" style="max-height: 300px; overflow-y: auto;"></ul>
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

    <style>
        .dropdown-menu {
            max-height: 300px;
            overflow-y: auto;
            display: none;
        }
        .dropdown-menu.show {
            display: block;
        }
        .dropdown-menu li {
            padding: 10px;
            cursor: pointer;
        }
        .dropdown-menu li:hover {
            background-color: #f8f9fa;
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script>
    const locations = [
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

    $(document).ready(function () {
        // -------- Location Suggestion --------
        $('#location-input').on('input', function () {
            const input = $(this).val().toLowerCase();
            const suggestions = locations.filter(loc => loc.toLowerCase().includes(input));
            const $dropdown = $('#location-suggestions');
            $dropdown.empty().toggleClass('show', suggestions.length > 0);
            suggestions.forEach(loc => {
                $dropdown.append(`<li class="dropdown-item">${loc}</li>`);
            });
        });

        $(document).on('click', '#location-suggestions li', function () {
            $('#location-input').val($(this).text());
            $('#location-suggestions').removeClass('show');
        });

        // -------- Service Suggestion via AJAX --------
        $('#service-input').on('input', function () {
    const term = $(this).val().trim();
    const $dropdown = $('#service-suggestions');

    if (term.length < 1) {
        return $dropdown.removeClass('show').empty();
    }

    $.ajax({
        url: '/service-search',
        method: 'GET',
        data: { term },
        success: function (data) {
            $dropdown.empty();
            if (data.length > 0) {
                data.forEach(service => {
                    $dropdown.append(`<li class="dropdown-item" data-slug="${service.slug}">${service.name}</li>`);
                });
                $dropdown.addClass('show');
            } else {
                $dropdown.removeClass('show');
            }
        },
        error: function (xhr) {
            console.error("Search error:", xhr.responseText);
            $dropdown.removeClass('show').empty();
        }
    });
});

$(document).on('click', '#service-suggestions li', function () {
    const slug = $(this).data('slug');
    if (slug) {
        window.location.href = '/service-details/' + slug;
    }
});
    });
</script>
</nav>
