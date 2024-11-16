<?php

namespace App\Livewire\Admin\Components;

use App\Models\Booking;
use Livewire\Component;
use Livewire\WithPagination;

class BookingTable extends Component
{
    use WithPagination;
    public function render()
    {
        $bookings = Booking::paginate(5);
        return view('livewire.admin.components.booking-table', [
            'bookings' => $bookings,
        ]);
    }
}
