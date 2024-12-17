<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactPage extends Model
{
    use HasFactory;

    protected $table = 'contact_page';
    protected $primaryKey = 'id';

    protected $fillable = [
        'address',
        'google_map',
        'pn1',
        'pn2',
        'email',
        'facebook',
        'instagram',
    ];


}
