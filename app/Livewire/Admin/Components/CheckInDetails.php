<?php

namespace App\Livewire\Admin\Components;

use App\Models\checkin_form;
use Livewire\Component;

class CheckInDetails extends Component
{
    public $checkIn, $notes, $checkin_date, $expectedCheckOutDate, $exported;
    public function mount($id)
    {
        $this->checkIn = checkin_form::with(['users', 'checkin_details.room'])->findOrFail($id);

        $this->notes = $this->checkIn->notes;
        $this->checkin_date = $this->checkIn->checkin_date;
        $this->expectedCheckOutDate = $this->checkIn->expectedCheckOutDate;
        $this->exported = $this->checkIn->exported;
        return view('livewire.admin.components.check-in-details', ['checkIn' => $this->checkIn, 'notes' => $this->notes, 'checkin_date' => $this->checkin_date, 'expectedCheckOutDate' => $this->expectedCheckOutDate, 'exported' => $this->exported]);
    }

    public function render()
    {
        return view('livewire.admin.components.check-in-details', ['checkIn' => $this->checkIn, 'isEditing' => $this->isEditing]);
    }
}
