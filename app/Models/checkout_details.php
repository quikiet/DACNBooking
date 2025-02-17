<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout_details extends Model
{
    use HasFactory;

    protected $table = 'check-out_details';

    protected $primaryKey = 'id';

    protected $fillable = [
        'checkout_id',
        'room_id',
        'cleaning_fee',
    ];

    public function checkout_form()
    {
        return $this->belongsTo(checkout_form::class, 'checkout_id ', 'checkout_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'room_id');
    }
}
