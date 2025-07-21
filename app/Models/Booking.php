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
    'location',
    'tax_percentage',     
    'tax_amount',         
    'grand_total' 
];

protected $casts = [
    'booking_date' => 'datetime'
];
// Add this method so you can fetch user details in Admin Panel
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
