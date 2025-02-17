<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkin_details extends Model
{
    use HasFactory;

    protected $table = 'check-in_details';

    protected $primaryKey = 'id';

    public $timestamps = true;

    protected $fillable = [
        'checkin_id',
        'room_id',
        'checkin_date',
        'expectedCheckOutDate',
        'price_per_night',
        'number_of_night',
        'sub_total',
        'exported',
    ];

    public function checkin_form()
    {
        return $this->belongsTo(checkin_form::class, 'checkin_id', 'checkin_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
}
