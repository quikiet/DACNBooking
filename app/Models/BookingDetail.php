<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingDetail extends Model
{
    protected $fillable = [
        'booking_id',
        'room_type_id',
        'quantity',
        'price_per_room',
        'room_id'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class, 'booking_id', 'booking_id');
    }

    public function roomType()
    {
        return $this->belongsTo(TypeRoom::class, 'room_type_id', 'room_type_id');
    }





}
