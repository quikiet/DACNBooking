<?php

namespace App\Livewire\Admin\Components;

use App\Models\Booking;
use App\Models\BookingRoom;
use App\Models\Room;
use Livewire\Component;

class ChooseRoom extends Component
{
    public $bookings; // Danh sách bookings
    public $selectedBooking; // Booking đang được chỉnh sửa
    public $availableRooms = []; // Danh sách phòng trống
    public $assignedRooms = []; // Phòng đã gán cho booking
    public $checkIn;
    public $checkOut;

    public function mount()
    {
        // Load danh sách booking ban đầu
        $this->bookings = Booking::with('bookingDetail')->get();
    }

    public function render()
    {
        return view('livewire.admin.components.choose-room');
    }
}
