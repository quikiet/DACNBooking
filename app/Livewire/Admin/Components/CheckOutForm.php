<?php

namespace App\Livewire\Admin\Components;

use App\Models\checkin_details;
use App\Models\checkin_form;
use App\Models\checkout_details;
use App\Models\checkout_form;
use Carbon\Carbon;
use Livewire\Component;
use Mary\Traits\Toast;

class CheckOutForm extends Component
{
    use Toast;
    public $checkinId;
    public $checkInDetails;
    public $checkOuts;

    public function mount($checkinId)
    {
        $this->checkinId = $checkinId;

        // Load thông tin phiếu thuê
        $this->checkInDetails = checkin_details::findOrFail($this->checkinId);
        // dd($this->checkInDetails);
        // Load danh sách phiếu trả
        $this->completeCheckOut();
    }

    public function loadCheckOuts()
    {
        $this->checkOuts = checkout_form::all();
    }

    public function completeCheckOut()
    {
        // Cập nhật ngày trả thực tế trong CheckIn chi tiết
        $this->checkInDetails->update([
            'expectedCheckOutDate' => Carbon::now(),
            'exported' => true,
        ]);

        // Tạo phiếu trả mới
        $checkout = checkout_form::create([
            'checkin_id' => $this->checkInDetails->checkin_form->checkin_id,
            'checkout_date' => Carbon::now(),
            'total_pay' => $this->checkInDetails->sub_total,
        ]);

        $checkoutId = $checkout->checkout_id;

        checkout_details::create([
            'checkout_id' => $checkoutId,
            'room_id' => $this->checkInDetails->room_id,
            'cleaning_fee' => 100000,
        ]);

        $this->success('Xuất phiếu thuê', 'Xuất phiếu thuê thành công!');
        return redirect()->route('admin.checkoutform');
    }



    public function render()
    {
        return view('livewire.admin.components.check-out-form', [
            'checkOuts' => $this->checkOuts,
        ]);
    }
}
