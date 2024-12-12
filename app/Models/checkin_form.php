<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkin_form extends Model
{
    use HasFactory;

    protected $table = 'check-in_form';

    protected $primaryKey = 'checkin_id';

    public $timestamps = true;

    protected $fillable = [
        'user_id',
        'checkin_date',
        'expectedCheckOutDate',
        'total_pay',
        'status',
        'notes',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function checkin_details()
    {
        return $this->hasMany(checkin_details::class, 'checkin_id', 'checkin_id');
    }

    public function checkout_form()
    {
        return $this->hasMany(checkout_form::class, 'checkin_id', 'checkin_id');
    }
}
