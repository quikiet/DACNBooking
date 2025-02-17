<?php

namespace App\Livewire\Layout;

use App\Models\Booking;
use App\Models\BookingDetail;
use Auth;
use Livewire\Component;

class CartBooking extends Component
{

    public $bookingCart = [];

    protected $listeners = ['refreshCart' => 'refresh'];
    public $totalPay = 0;
    public $totalGuests;
    // public function mount()
    // {
    //     $cart = session()->get('bookingCart', []);
    //     $this->totalPay = 0;
    //     foreach ($cart as $item) {
    //         $this->totalPay += $item['price_per_room'] * $item['quantity'];
    //     }
    //     $this->refresh();
    // }

    public function refresh()
    {
        $this->bookingCart = session()->get('bookingCart', []);
    }

    public function mount()
    {
        // $this->refresh();
    }

    public function removeFromCart($typeRoomId)
    {
        $cart = session()->get('bookingCart', []);
        // $quantityToRestore = $cart[$typeRoomId]['quantity'];

        // Xóa khỏi giỏ hàng
        unset($cart[$typeRoomId]);
        session()->put('bookingCart', $cart);
        // $availableRooms = session()->get("available_rooms.$typeRoomId", 0);
        // session()->put("available_rooms.$typeRoomId", $availableRooms + $quantityToRestore);
        // $this->dispatch('refreshPage');
        $this->refresh();
    }

    // public function checkout()
    // {
    //     $cart = session()->get('bookingCart', []);
    //     $totalPay = 0;
    //     $totalGuests = 0;
    //     foreach ($cart as $item) {
    //         $totalPay += $item['price_per_room'] * $item['quantity'];
    //         $totalGuests += $item['quantity'] * ($item['adult'] + $item['children']);
    //     }

    //     $booking = Booking::create([
    //         'user_id' => Auth::id(),
    //         'check_in' => now()->addDays(1),
    //         'check_out' => now()->addDays(2),
    //         'total_pay' => $totalPay,
    //         'total_guests' => $totalGuests,
    //         'status' => 'pending',
    //         'refund' => false,
    //     ]);


    //     foreach ($cart as $item) {
    //         BookingDetail::create([
    //             'booking_id' => $booking->booking_id,
    //             'room_type_id' => $item['room_type_id'],
    //             'quantity' => $item['quantity'],
    //             'price_per_room' => $item['price_per_room'],
    //         ]);
    //     }

    //     // Xóa giỏ hàng sau khi hoàn thành thanh toán
    //     session()->forget('bookingCart');
    //     $this->mount();
    // }

    public function render()
    {
        $cart = session()->get('bookingCart', []);
        $this->totalPay = 0;
        foreach ($cart as $item) {
            $this->totalPay += $item['price_per_room'] * $item['quantity'];
        }
        return view('livewire.layout.cart-booking', ['cart' => $this->bookingCart]);
    }
}
