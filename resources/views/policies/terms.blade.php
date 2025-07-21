@extends('layouts.app')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 fw-bold">Terms of Service</h1>

    <p class="mb-4 text-muted">
        Last Updated: {{ date('F d, Y') }}
    </p>

    <h4 class="fw-bold mt-5 mb-3">1. Acceptance of Terms</h4>
    <p>
        By accessing BokMap or using our services, you agree to these Terms of Service. If you do not agree, please refrain from using our platform.
    </p>

    <h4 class="fw-bold mt-5 mb-3">2. Service Scope</h4>
    <p>
        BokMap offers on-demand home services like AC repair, cleaning, carpentry, plumbing, etc., booked through our platform. Services are delivered by independent professionals verified by us.
    </p>

    <h4 class="fw-bold mt-5 mb-3">3. User Responsibilities</h4>
    <ul>
        <li>Provide accurate personal and address information while booking.</li>
        <li>Ensure a safe and respectful environment for service providers.</li>
        <li>Refrain from using BokMap for unlawful or harmful purposes.</li>
    </ul>

    <h4 class="fw-bold mt-5 mb-3">4. Payments</h4>
    <p>
        Payments must be made via available methods (UPI, debit/credit card, or COD). BokMap is not liable for any transaction failure caused by third-party gateways.
    </p>

    <h4 class="fw-bold mt-5 mb-3">5. Cancellations & Refunds</h4>
    <ul>
        <li>You may cancel a booking before the professional is assigned with no charge.</li>
        <li>Once a service is started, refunds are not applicable.</li>
        <li>Refunds (if applicable) will be processed within 5–7 working days.</li>
    </ul>

    <h4 class="fw-bold mt-5 mb-3">6. Professional Conduct</h4>
    <p>
        Our professionals are background-verified and trained. Any misconduct should be reported immediately for investigation.
    </p>

    <h4 class="fw-bold mt-5 mb-3">7. Limitation of Liability</h4>
    <p>
        BokMap is not liable for:
        <ul>
            <li>Delays due to weather, traffic, or emergencies.</li>
            <li>Losses from user negligence or incomplete information.</li>
            <li>Third-party links or apps accessed via our platform.</li>
        </ul>
    </p>

    <h4 class="fw-bold mt-5 mb-3">8. Modification of Terms</h4>
    <p>
        BokMap may revise these Terms periodically. Continued use of the platform implies acceptance of updated terms.
    </p>

    <h4 class="fw-bold mt-5 mb-3">9. Contact Information</h4>
    <p>
        For any queries or complaints, reach out to:
        <br>
        📧 <a href="mailto:bokmapcompany@gmail.com">bokmapcompany@gmail.com</a>
        <br>
        📞 +91 6291030338
    </p>
</div>
@endsection
