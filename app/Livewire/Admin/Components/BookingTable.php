<?php

namespace App\Livewire\Admin\Components;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class BookingTable extends Component
{
    use WithPagination;
    use Toast;

    public function updateStatus($bookingId, $status)
    {
        $booking = Booking::find($bookingId);
        if ($booking) {
            $booking->status = $status;
            $booking->save();

            $this->success("Cập nhật thành công!", "Bạn đã cập nhật kiểu phòng thành công", "toast-top toast-center");
        } else {
            $this->error("Cập nhật thất bại!", "Bạn chưa cập nhật phòng được", "toast-top toast-center");
        }
    }
    public function render()
    {
        $bookings = Booking::paginate(5);
        return view('livewire.admin.components.booking-table', [
            'bookings' => $bookings,
        ]);
    }
}
