<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $user, $bookings;

    public function __construct($user, $bookings)
    {
        $this->user = $user;
        $this->bookings = $bookings;
    }

    public function build()
    {
        return $this->subject('BokMap Booking Confirmation')
            ->view('emails.booking.booking_confirmation');
    }
}

