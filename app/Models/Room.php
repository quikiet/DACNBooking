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

    protected $attributes = [
        'status' => 'available',
    ];

    public function typeRoom()
    {
        return $this->belongsTo(TypeRoom::class, 'room_type_id', 'room_type_id');
    }

    public function room_images()
    {
        return $this->hasMany(RoomImage::class, 'room_id', 'room_id');
    }
}
