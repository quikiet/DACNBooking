<?php

namespace App\Livewire\Admin\Components;

use App\Models\checkin_form;
use Livewire\Component;

class CheckInEdit extends Component
{
    public $checkIn;
    public $notes, $checkin_date, $expectedCheckOutDate; // Thêm các trường cần cập nhật

    public function mount($id)
    {
        // Tìm checkin_form theo id
        $this->checkIn = checkin_form::findOrFail($id);
        // dd($this->checkIn);
        // Gán các giá trị cần thiết từ checkIn vào các thuộc tính public
        $this->notes = $this->checkIn->notes;
        $this->checkin_date = $this->checkIn->checkin_date;
        $this->expectedCheckOutDate = $this->checkIn->expectedCheckOutDate;
    }

    public function update()
    {
        $this->validate([
            'notes' => 'nullable|string|max:255',
            'checkin_date' => 'required|date',
            'expectedCheckOutDate' => 'required|date|after_or_equal:checkin_date',
        ]);

        // Cập nhật dữ liệu checkin_form
        $this->checkIn->update([
            'notes' => $this->notes,
            'checkin_date' => $this->checkin_date,
            'expectedCheckOutDate' => $this->expectedCheckOutDate,
        ]);

        // Điều hướng về trang danh sách checkin
        return redirect('/admin/checkin-form');
    }
    public function render()
    {
        return view('livewire.admin.components.check-in-edit');
    }
}
