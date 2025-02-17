<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;

class bookingInfoForm extends Form
{
    //
    #[Validate('required', message: 'Vui lòng không được bỏ trống')]
    #[Validate('min:3', message: 'Ít nhất là 3 ký tự')]

    public $customer_name;

    #[Validate('required', message: 'Vui lòng không được bỏ trống')]
    #[Validate('email', message: 'Vui lòng nhập đúng kiểu email')]
    public $customer_email;

    #[Validate('required', message: 'Vui lòng không được bỏ trống')]
    #[Validate('regex:/^(0|\+84)[1-9][0-9]{8}$/', message: 'Vui lòng nhập đúng số điện thoại để thuận lợi trong việc liên hệ')]
    public $customer_phone;

    #[Validate('nullable|string')]
    public $customer_address;

}
