@extends('layouts.app')

@section('content')
<div class="container py-5 d-flex justify-content-center align-items-center" style="min-height: 80vh;">
    <div class="card shadow-lg p-4 rounded" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4" style="font-weight: 700; font-size: 2rem;">Login</h2>

        {{-- Error message --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Phone number form -->
        <form method="POST" action="{{ route('otp.send') }}" id="phone-form">
            @csrf
            <div class="mb-3">
                <label for="phone" class="form-label">Phone Number</label>
                <input type="text" name="phone" id="phone" class="form-control" required placeholder="Enter phone number">
            </div>
            <button type="submit" class="btn btn-dark w-100">Send OTP</button>
        </form>

        <!-- OTP form - shown via JS -->
        <form method="POST" action="{{ route('otp.verify') }}" id="otp-form" style="display: none; margin-top: 20px;">
            @csrf
            <input type="hidden" name="phone" id="otp-phone-hidden">

            <div class="mb-3">
                <label for="otp" class="form-label">Enter OTP</label>
                <input type="text" name="otp" id="otp" class="form-control" required placeholder="Enter OTP">
            </div>

            <button type="submit" class="btn btn-success w-100">Verify OTP & Login</button>

            <div class="text-center mt-2">
                <button type="button" id="resend-otp-btn" class="btn btn-link">Resend OTP</button>
            </div>
        </form>

        <!-- New User Register Link -->
        <div class="text-center mt-4">
            <p class="mb-0">New to BokMap? <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">Register here</a></p>
        </div>
    </div>
</div>

<!-- ✅ JS Section -->
<script>
    const phoneForm = document.getElementById('phone-form');
    const otpForm = document.getElementById('otp-form');
    const sendBtn = phoneForm.querySelector('button');
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    phoneForm.addEventListener('submit', function(event) {
        event.preventDefault();

        const phone = document.getElementById('phone').value;

        sendBtn.disabled = true;
        sendBtn.innerText = 'Sending...';

        fetch("{{ route('otp.send') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ phone })
        })
        .then(async (res) => {
            sendBtn.disabled = false;
            sendBtn.innerText = 'Send OTP';

            const data = await res.json();

            if (res.ok && data.success) {
                otpForm.style.display = 'block';
                phoneForm.style.display = 'none';
                document.getElementById('otp-phone-hidden').value = phone;
            } else {
                alert(data.message || "Failed to send OTP");
            }
        })
        .catch(err => {
            console.error(err);
            alert("Something went wrong. Please try again.");
            sendBtn.disabled = false;
            sendBtn.innerText = 'Send OTP';
        });
    });

    document.getElementById('resend-otp-btn').addEventListener('click', function () {
        const phone = document.getElementById('otp-phone-hidden').value;

        fetch("{{ route('otp.send') }}", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ phone })
        })
        .then(async (res) => {
            const data = await res.json();
            if (data.success) {
                alert("OTP resent successfully!");
            } else {
                alert(data.message || "Failed to resend OTP");
            }
        })
        .catch(err => {
            console.error(err);
            alert("Something went wrong. Please try again.");
        });
    });
</script>
@endsection
