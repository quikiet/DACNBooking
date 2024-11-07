<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RoomForm extends Form
{
    #[Validate('required', message: 'Vui lòng không được bỏ trống')]
    #[Validate('min:3', message: 'Ít nhất là 3 ký tự')]
    public $name;
    #[Validate('required', message: 'Vui lòng không được bỏ trống')]
    public $room_number;
    #[Validate('required', 'in:available,booked,fixing,occupied')]
    public $status;

    #[Validate('required', message: 'Chọn 1 trong các loại sau')]
    public $room_type_id;


}
