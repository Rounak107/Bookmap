<h2>Hello {{ $user->name }},</h2>
<p>Your booking has been confirmed. Here are the details:</p>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>Service</th>
            <th>Date</th>
            <th>Qty</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->service_name }}</td>
            <td>{{ $booking->booking_date }}</td>
            <td>{{ $booking->quantity }}</td>
            <td>₹{{ $booking->total_price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<p>We look forward to serving you. Thank you for using BokMap!</p>
