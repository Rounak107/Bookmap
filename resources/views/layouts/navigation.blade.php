
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold d-flex align-items-center" href="{{ route('home') }}">
            <i class="fas fa-tools me-2"></i> BokMap
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown">
                        Services
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark">
                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="#">{{ $category->name }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">How It Works</a>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <!-- ... keep existing auth logic ... -->
            </ul>
        </div>
    </div>
</nav>