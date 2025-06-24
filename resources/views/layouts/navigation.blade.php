<nav class="navbar navbar-expand-lg navbar-dark bg-black px-5 py-3">
    <div class="container-fluid">
        <!-- Logo -->
        <a class="navbar-brand d-flex align-items-center text-white fw-bold" href="#">
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
            <!-- Location Input -->
            <div class="input-group me-2">
                <span class="input-group-text bg-white"><i class="fas fa-map-marker-alt"></i></span>
                <input type="text" class="form-control" placeholder="Enter your location" id="location-input" autocomplete="off">
            </div>

            <!-- Search Input -->
            <div class="input-group">
                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                <input type="text" class="form-control" placeholder="Search for services" id="service-input" autocomplete="off">
            </div>
        </form>

        <!-- Cart and Profile -->
        <div class="d-flex align-items-center">
            <a href="#" class="text-white me-4"><i class="fas fa-shopping-cart fa-lg"></i></a>
            <a href="#" class="btn btn-outline-light">
                <i class="fas fa-user-circle me-1"></i> Login
            </a>
        </div>
    </div>
</nav>
