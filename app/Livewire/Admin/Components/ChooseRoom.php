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

    public function selectBooking($bookingId)
    {
        // Lấy thông tin booking được chọn
        $this->selectedBooking = Booking::with('bookingDetail')->findOrFail($bookingId);

        // Lấy danh sách các phòng trống
        $this->availableRooms = Room::where('status', 'available')->get();

        // Lấy danh sách các phòng đã gán cho booking này
        $this->assignedRooms = BookingRoom::where('booking_id', $bookingId)->with('room')->get();

        // Gán ngày check-in, check-out từ booking
        $this->checkIn = $this->selectedBooking->check_in;
        $this->checkOut = $this->selectedBooking->check_out;
    }

    public function assignRoom($roomId)
    {
        if (!$this->selectedBooking) {
            $this->emit('error', 'Vui lòng chọn một booking trước!');
            return;
        }

        // Thêm phòng vào booking
        BookingRoom::create([
            'booking_id' => $this->selectedBooking->booking_id,
            'room_id' => $roomId,
            'check_in' => $this->checkIn,
            'check_out' => $this->checkOut,
        ]);

        // Cập nhật trạng thái phòng
        Room::where('room_id', $roomId)->update(['status' => 'booked']);

        $this->success('success', 'Phòng đã được gán thành công!');

        // Refresh danh sách phòng
        $this->selectBooking($this->selectedBooking->booking_id);
    }

    public function unassignRoom($roomId)
    {
        if (!$this->selectedBooking) {
            return;
        }

        // Xóa phòng khỏi booking
        BookingRoom::where('booking_id', $this->selectedBooking->booking_id)
            ->where('room_id', $roomId)
            ->delete();

        // Cập nhật trạng thái phòng
        Room::where('room_id', $roomId)->update(['status' => 'available']);

        // Refresh danh sách phòng
        $this->selectBooking($this->selectedBooking->booking_id);
    }

    public function render()
    {
        return view('livewire.admin.components.choose-room');
    }
}
