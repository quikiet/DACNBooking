<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $primaryKey = 'room_id';

    public $timestamps = true;
    protected $fillable = [
        'name',
        'room_number',
        'status',
        'room_type_id',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($room) {
            // Lấy thông tin check_in, check_out từ request hoặc session
            $check_in = request()->get('check_in', now()->toDateString()); // Lấy giá trị mặc định nếu không có
            $check_out = request()->get('check_out', now()->addDay()->toDateString());

            $room->typeRoom->updateRoomCounts($check_in, $check_out);
        });

        static::updated(function ($room) {
            // Lấy thông tin check_in, check_out từ request hoặc session
            $check_in = request()->get('check_in', now()->toDateString());
            $check_out = request()->get('check_out', now()->addDay()->toDateString());

            $room->typeRoom->updateRoomCounts($check_in, $check_out);
        });

        static::deleted(function ($room) {
            // Lấy thông tin check_in, check_out từ request hoặc session
            $check_in = request()->get('check_in', now()->toDateString());
            $check_out = request()->get('check_out', now()->addDay()->toDateString());

            $room->typeRoom->updateRoomCounts($check_in, $check_out);
        });
    }


    public function typeRoom()
    {
        return $this->belongsTo(TypeRoom::class, 'room_type_id', 'room_type_id');
    }

    public function booking_details()
    {
        return $this->hasMany(BookingDetail::class, 'room_id', 'room_id');
    }
    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, BookingDetail::class, 'room_id', 'booking_id', 'room_id', 'booking_id');
    }
}
