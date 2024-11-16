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
    ];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }

    public function availableRooms()
    {
        return $this->hasMany(Room::class, 'room_type_id')->where('status', 'available');
    }

    public function room_images()
    {
        return $this->hasMany(RoomImage::class, 'room_type_id');
    }
}
