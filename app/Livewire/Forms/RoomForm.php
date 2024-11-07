<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RoomForm extends Form
{
    #[Validate('required', message: 'Vui lòng không được bỏ trống')]
    public $name;
    #[Validate('required')]
    public $room_number;
    #[Validate('required|in:available,booked,fixing,occupied')]
    public $status;

    #[Validate('required')]
    public $room_type_id;
}
