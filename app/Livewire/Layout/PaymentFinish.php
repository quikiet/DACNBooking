<?php

namespace App\Livewire\Layout;

use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Room;
use Auth;
use Illuminate\Http\Request;
use Livewire\Component;

class PaymentFinish extends Component
{
    public function makePayment(Request $request)
    {

        $vnp_ResponseCode = $request->get('vnp_ResponseCode');
        $vnp_TxnRef = $request->get('vnp_TxnRef'); // Mã bill

        $cart = session()->get('bookingCart', []);
        $totalGuests = 0;
        $totalPay = 0;
        foreach ($cart as $item) {
            $totalPay += $item['price_per_room'] * $item['quantity'];
            $totalGuests += $item['quantity'] * ($item['adult'] + $item['children']);
        }

        if ($vnp_ResponseCode == "00") {

            $booking = Booking::create([
                'user_id' => Auth::id(),
                'check_in' => now()->addDays(1),
                'check_out' => now()->addDays(2),
                'total_pay' => $totalPay,
                'bill_code' => $vnp_TxnRef,
                'total_guests' => $totalGuests,
                'status' => 'pending',
                'refund' => false,
            ]);

            foreach ($cart as $item) {
                BookingDetail::create([
                    'booking_id' => $booking->booking_id,
                    'room_type_id' => $item['room_type_id'],
                    'quantity' => $item['quantity'],
                    'price_per_room' => $item['price_per_room'],
                ]);

                $bookedToRoom = Room::where('room_type_id', $item['room_type_id'])
                    ->where('status', 'available')
                    ->take($item['quantity'])->get();

                foreach ($bookedToRoom as $room) {
                    $room->update(['status' => 'booked']);
                }
            }
            session()->forget('bookingCart');
            return redirect('/trang-chu');
        } else {
            // session()->flush();
            session()->forget('bookingCart');
            return redirect('/trang-chu');
        }
    }

    public function render()
    {
        return view('livewire.layout.payment-finish');
    }
}
