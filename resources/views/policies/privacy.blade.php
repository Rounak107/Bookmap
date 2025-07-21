@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 fw-bold">Privacy Policy</h1>

    <p class="mb-4 text-muted">
        Last Updated: {{ date('F d, Y') }}
    </p>

    <h4 class="fw-bold mt-5 mb-3">1. Introduction</h4>
    <p>
        BokMap is committed to protecting your privacy. This Privacy Policy outlines how we collect, use, and protect your personal information when you use our website or services.
    </p>

    <h4 class="fw-bold mt-5 mb-3">2. Information We Collect</h4>
    <ul>
        <li><strong>Personal Information:</strong> Name, mobile number, address, email ID when booking services.</li>
        <li><strong>Location Data:</strong> To match you with nearby service professionals.</li>
        <li><strong>Service Preferences:</strong> History of your bookings, ratings, and feedback.</li>
        <li><strong>Payment Information:</strong> UPI/card details via secured third-party gateways (we do not store payment data).</li>
    </ul>

    <h4 class="fw-bold mt-5 mb-3">3. How We Use Your Data</h4>
    <p>Your data helps us to:</p>
    <ul>
        <li>Confirm bookings and assign nearby professionals.</li>
        <li>Send updates, confirmations, and support messages.</li>
        <li>Improve service experience and user satisfaction.</li>
    </ul>

    <h4 class="fw-bold mt-5 mb-3">4. Data Security</h4>
    <p>
        We use industry-standard encryption and secure protocols to protect your data from unauthorized access or misuse.
    </p>

    <h4 class="fw-bold mt-5 mb-3">5. Sharing Your Information</h4>
    <p>
        We do not sell your personal data. Information is only shared:
        <ul>
            <li>With service professionals for service delivery.</li>
            <li>With payment gateways for transaction processing.</li>
            <li>When required by law or government request.</li>
        </ul>
    </p>

    <h4 class="fw-bold mt-5 mb-3">6. Cookies</h4>
    <p>
        We use cookies to remember your preferences and improve your browsing experience. You can disable them in your browser settings.
    </p>

    <h4 class="fw-bold mt-5 mb-3">7. Third-party Links</h4>
    <p>
        BokMap may contain links to third-party websites (e.g., Instagram, YouTube). We are not responsible for their content or privacy practices.
    </p>

    <h4 class="fw-bold mt-5 mb-3">8. Your Rights</h4>
    <p>
        You may request access, correction, or deletion of your data by contacting us at <a href="mailto:bokmapcompany@gmail.com">bokmapcompany@gmail.com</a>.
    </p>

    <h4 class="fw-bold mt-5 mb-3">9. Contact Us</h4>
    <p>
        If you have any questions regarding this policy, feel free to contact us:
        <br>
        📧 <a href="mailto:bokmapcompany@gmail.com">bokmapcompany@gmail.com</a>
        <br>
        📞 +91 6291030338
    </p>
</div>
@endsection
