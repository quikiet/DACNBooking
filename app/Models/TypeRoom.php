<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeRoom extends Model
{
    //

    use HasFactory;

    protected $table = 'room_types';
    protected $primaryKey = 'room_type_id';

    public $timestamps = true;
    protected $fillable = [
        'name',
        'price',
        'adult',
        'children',
        'description',
        'quantity',
        'available_rooms_count',
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id', 'room_type_id');
    }

    public function room_images()
    {
        return $this->hasMany(RoomImage::class, 'room_type_id');
    }

    public function updateRoomCounts()
    {
        // Tính số phòng có sẵn mà không cần check_in và check_out
        $this->available_rooms_count = $this->rooms()->whereDoesntHave('booking_details')->count();
        $this->save();
    }


}
