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
            $room->typeRoom->updateRoomCounts();
        });

        static::updated(function ($room) {
            $room->typeRoom->updateRoomCounts();
        });

        static::deleted(function ($room) {
            $room->typeRoom->updateRoomCounts();
        });
    }

    public function typeRoom()
    {
        return $this->belongsTo(TypeRoom::class, 'room_type_id', 'room_type_id');
    }
}
