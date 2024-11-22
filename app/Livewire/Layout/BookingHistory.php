<?php

namespace App\Livewire\Layout;

use App\Models\Booking;
use Auth;
use Livewire\Component;

class BookingHistory extends Component
{
    public function render()
    {
        $booking_history = Booking::where('user_id', Auth::id())->get();
        return view('livewire.layout.booking-history', compact('booking_history'));
    }
}
