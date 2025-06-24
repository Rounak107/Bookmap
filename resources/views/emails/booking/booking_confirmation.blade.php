<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Booking Confirmation</title>
</head>
<body>
    <h2>Hello {{ $user->name }},</h2>

    <p>Thank you for booking with <strong>BokMap</strong>! Here are your booking details:</p>

    <table border="1" cellpadding="10" cellspacing="0" style="border-collapse: collapse;">
        <thead>
            <tr>
                <th>Service</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach($bookings as $booking)
                <tr>
                    <td>{{ $booking->service_name }}</td>
                    <td>{{ $booking->quantity }}</td>
                    <td>₹{{ $booking->total_price }}</td>
                    <td>{{ $booking->booking_date }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <p>We’ll be in touch soon to confirm your service time. See you soon!</p>
    <br>
    <p>– BokMap Team</p>
</body>
</html>
