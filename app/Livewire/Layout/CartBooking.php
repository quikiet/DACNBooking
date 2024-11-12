<?php

namespace App\Livewire\Layout;

use Livewire\Component;

class CartBooking extends Component
{

    public $bookingCart = [];

    public function mount()
    {
        $this->bookingCart = session()->get('bookingCart', []);
    }

    public function removeFromCart($typeRoomId)
    {
        $cart = session()->get('bookingCart', []);
        if (isset($cart[$typeRoomId])) {
            unset($cart[$typeRoomId]);
        }
        session()->put('bookingCart', $cart);
        $this->bookingCart = $cart;
    }

    public function render()
    {
        $cart = session()->get('bookingCart', []);
        return view('livewire.layout.cart-booking', compact('cart'));
    }
}
