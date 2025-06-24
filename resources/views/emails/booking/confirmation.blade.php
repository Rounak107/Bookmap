@extends('layouts.app')

@section('content')
<div class="container text-center py-5">
    <h2 class="text-success"><i class="fas fa-check-circle"></i> Booking Successful!</h2>
    <p class="mt-3">Thank you for booking with <strong>BokMap</strong>. A confirmation email has been sent.</p>
    <a href="{{ route('home') }}" class="btn btn-primary mt-4">Return to Homepage</a>
</div>
@endsection
