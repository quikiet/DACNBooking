<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    protected $primaryKey = "booking_id";



    protected $fillable = [
        'user_id',
        'booking_id',
        'customer_name',
        'customer_email',
        'customer_phone',
        'customer_address',
        'check_in',
        'check_out',
        'bill_code',
        'total_guests',
        'total_pay',
        'status',
        'refund',
    ];
    public function bookingDetail()
    {
        return $this->hasMany(BookingDetail::class, 'booking_id', 'booking_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
