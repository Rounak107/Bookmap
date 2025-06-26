@extends('layouts.app')

@section('content')
<div class="container mt-5 mb-5" style="max-width: 450px;">
    <div class="card shadow-lg border-0">
        <div class="card-body">
            <h3 class="text-center mb-4">Create an Account</h3>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-3">
                    <label for="phone">Phone Number</label>
                    <input id="phone" type="text" class="form-control" name="phone" required>
                </div>


                <div class="mb-3">
                    <label for="password" class="form-label">Password (min 8 characters)</label>
                    <input id="password" type="password" class="form-control" name="password" required>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" required>
                </div>

                <button type="submit" class="btn btn-primary w-100">Register</button>
            </form>

            <div class="mt-3 text-center">
                Already have an account? <a href="{{ route('login') }}">Login here</a>
            </div>
        </div>
    </div>
</div>
@endsection
