<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'BokMap') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

    
    
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        :root {
            --primary:rgba(218, 223, 247, 0.99);
            --primary-light: #eef2ff;
            --success: #10b981;
            --success-light: #ecfdf5;
            --dark: #1e293b;
            --light: #f8fafc;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f9fafb;
            color: #334155;
        }
        
        .avatar-sm {
            width: 32px;
            height: 32px;
        }
        
        .bg-primary-light {
            background-color: var(--primary-light);
        }
        
        .bg-success-light {
            background-color: var(--success-light);
        }
        
        .hover-shadow {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .nav-link:hover {
            text-decoration: underline;
        }

        .hover-shadow:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

                .hover-scale {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-scale:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }
        .service-badge {
            position: absolute;
            top: 15px;
            right: 15px;
            z-index: 2;
        }
                nav.navbar {
            z-index: 9999;
            width: 100%;
        }

        .icon-md {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .icon-lg {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

            .icon-lg {
            width: 60px;
            height: 60px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* ✅ Service Card Hover Grow & Glow */
        .service-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .service-card:hover {
            transform: translateY(-8px) scale(1.03);
            box-shadow: 0 10px 20px rgba(0, 123, 255, 0.2);
        }

        .card-img-top {
            height: 180px;
            object-fit: contain;
            padding: 1rem;
        }

        .card-title {
            font-size: 1rem;
            font-weight: 600;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">
    @include('partials.navigation')

    
    <main class="flex-grow-1 py-4">
   @if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif



        @yield('content')
    </main>
    
    @include('layouts.footer')
    
    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')

</body>
</html>