<?php

namespace App\Livewire\Layout;

use App\Models\Booking;
use App\Models\BookingDetail;
use Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use Mary\Traits\Toast;

class MakePayment extends Component
{
    use Toast;
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
            }
            session()->forget('bookingCart');
            return redirect('/danh-sach-phong')->with('SuccessMessage');
        }
        $this->error('Thanh toán không thành công.', redirectTo: '/danh-sach-phong');

    }

    public function render()
    {
        return view('livewire.layout.make-payment');
    }
}
