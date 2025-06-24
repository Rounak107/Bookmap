@extends('layouts.app')

@section('content')
<div class="container py-5" style="max-width: 500px;">
    <h2 class="mb-4 text-center">Login to BokMap</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autofocus>
            @error('email')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control" required>
            @error('password')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="remember" id="remember">
            <label class="form-check-label" for="remember">Remember me</label>
        </div>

        <div class="d-flex justify-content-between align-items-center">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-decoration-underline">Forgot Password?</a>
            @endif

            <button type="submit" class="btn btn-dark">Login</button>
        </div>
    </form>

    <div class="text-center mt-3">
    Don't have an account? <a href="{{ route('register') }}">Register here</a>
</div>
</div>
@endsection
