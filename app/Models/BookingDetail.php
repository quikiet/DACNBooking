<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'booking_id',
        'room_type_id',
        'quantity',
        'price_per_room'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}
