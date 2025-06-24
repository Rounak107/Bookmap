<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
   // app/Models/Booking.php
protected $fillable = [
    'user_id',
    'service_id',
    'service_name',
    'quantity',
    'total_price',
    'booking_date',
    'payment_method',
    'status',
];

protected $casts = [
    'booking_date' => 'datetime'
];
}
