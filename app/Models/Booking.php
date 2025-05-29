<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   // app/Models/Booking.php
protected $fillable = [
    'user_id',
    'service_id',
    'booking_date',
    'status',
    'payment_status',
    'stripe_session_id',
    'booking_reference'
];

protected $casts = [
    'booking_date' => 'datetime'
];
}
