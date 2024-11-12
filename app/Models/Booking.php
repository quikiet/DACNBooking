<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    protected $fillable = [
        'booking_id',
        'check_in',
        'check_out',
        'total_guests',
        'total_pay',
        'status',
        'refund',
    ];
    public function bookingDetails()
    {
        return $this->hasMany(BookingDetail::class);
    }
}
