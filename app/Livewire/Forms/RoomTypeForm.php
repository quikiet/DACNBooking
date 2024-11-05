<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class RoomTypeForm extends Form
{
    //
    #[Validate('required|string|max:255')]
    public $name = '';
    #[Validate('required|numeric')]
    public $price = '';
    #[Validate('required|integer')]
    public $adult = '';
    #[Validate('required|integer')]
    public $children = '';
    #[Validate('nullable|string')]
    public $description = '';
}
