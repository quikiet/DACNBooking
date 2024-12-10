<?php

namespace App\Livewire\Layout;

use App\Livewire\Forms\bookingInfoForm;
use App\Models\Booking;
use App\Models\BookingDetail;
use App\Models\Room;
use Auth;
use Illuminate\Http\Request;
use Livewire\Component;
use Mary\Traits\Toast;

class MakePayment extends Component
{
    use Toast;
    public bookingInfoForm $bookForm;

    public $bookingCart = [];

    public $totalPay;
    public $check_in;
    public $check_out;

    public $showModal = false;

    public $rules = [
        'check_in' => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after:check_in',
    ];

    // public function resetInfor()
    // {
    //     $cart = session()->get('bookingCart', []);
    //     $cart = [
    //         'user_id' => '',
    //         'customer_name' => '',
    //         'customer_email' => '',
    //         'customer_phone' => '',
    //         'customer_address' => '',
    //         'check_in' => '',
    //         'check_out' => '',
    //     ];
    //     session()->put('bookingCart', $cart);
    // }

    public function mount()
    {
        $this->check_in = now()->addDay(1)->toDateString();
        $this->check_out = now()->addDay(2)->toDateString();
        // $this->resetInfor();
        $cart = session()->get('bookingCart', []);
        $this->totalPay = 0;
        foreach ($cart as $item) {
            $this->totalPay += $item['price_per_room'] * $item['quantity'];
        }

        $this->bookingCart = session()->get('bookingCart', []);
    }

    public function fillInfor()
    {
        $this->bookForm->validate();
        $this->validate();
        // $cart = session()->get('bookingCart', []);
        $bookingInfo = [
            'user_id' => auth()->id(), // Lấy user đăng nhập
            'customer_name' => $this->bookForm->customer_name,
            'customer_email' => $this->bookForm->customer_email,
            'customer_phone' => $this->bookForm->customer_phone,
            'customer_address' => $this->bookForm->customer_address,
            'check_in' => $this->check_in,
            'check_out' => $this->check_out,
        ];
        session()->put('bookingInfo', $bookingInfo);
        $this->showModal = true;
    }

    // public function makePayment(Request $request)
    // {

    //     $vnp_ResponseCode = $request->get('vnp_ResponseCode');
    //     $vnp_TxnRef = $request->get('vnp_TxnRef'); // Mã bill

    //     $cart = session()->get('bookingCart', []);
    //     $totalGuests = 0;
    //     $totalPay = 0;
    //     foreach ($cart as $item) {
    //         $totalPay += $item['price_per_room'] * $item['quantity'];
    //         $totalGuests += $item['quantity'] * ($item['adult'] + $item['children']);
    //     }

    //     if ($vnp_ResponseCode == "00") {

    //         $booking = Booking::create([
    //             'user_id' => Auth::id(),
    //             'check_in' => now()->addDays(1),
    //             'check_out' => now()->addDays(2),
    //             'total_pay' => $totalPay,
    //             'bill_code' => $vnp_TxnRef,
    //             'total_guests' => $totalGuests,
    //             'status' => 'pending',
    //             'refund' => false,
    //         ]);

    //         foreach ($cart as $item) {
    //             BookingDetail::create([
    //                 'booking_id' => $booking->booking_id,
    //                 'room_type_id' => $item['room_type_id'],
    //                 'quantity' => $item['quantity'],
    //                 'price_per_room' => $item['price_per_room'],
    //             ]);

    //             $bookedToRoom = Room::where('room_type_id', $item['room_type_id'])
    //                 ->where('status', 'available')
    //                 ->take($item['quantity'])->get();

    //             foreach ($bookedToRoom as $room) {
    //                 $room->update(['status' => 'booked']);
    //             }
    //         }
    //         session()->forget('bookingCart');
    //         $this->success(
    //             title: 'It is done!',
    //             description: null,                  // optional (text)
    //             position: 'toast-top toast-end',    // optional (daisyUI classes)
    //             icon: 'o-information-circle',       // Optional (any icon)
    //             css: 'alert-info',                  // Optional (daisyUI classes)
    //             timeout: 3000,                      // optional (ms)
    //         );
    //         redirect('/danh-sach-phong')->with('SuccessMessage');
    //     }
    //     $this->error('Thanh toán không thành công.', redirectTo: '/danh-sach-phong');

    // }

    public function render()
    {
        // session()->flush();
        return view('livewire.layout.make-payment', ['cart' => $this->bookingCart]);
    }
}
