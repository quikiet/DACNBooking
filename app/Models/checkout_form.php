<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class checkout_form extends Model
{
    use HasFactory;

    protected $table = 'check-out_form';

    protected $primaryKey = 'checkout_id';

    protected $fillable = [
        'checkin_id',
        'checkout_date',
        'total_pay',
    ];

    public function checkin_form()
    {
        return $this->belongsTo(checkin_form::class, 'checkin_id', 'checkin_id');
    }

    public function checkout_details()
    {
        return $this->hasMany(checkout_details::class, 'checkout_id', 'checkout_id');
    }
}
