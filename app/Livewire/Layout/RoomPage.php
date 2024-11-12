<?php

namespace App\Livewire\Layout;

use App\Models\Room;
use App\Models\TypeRoom;
use Livewire\Component;

class RoomPage extends Component
{
    // public $typeRooms;

    public $adult = 0;
    public $children = 0;

    public $bookingCart = [];


    public function addToCart($typeRoomId, $quantity, $pricePerRoom)
    {
        $tr = TypeRoom::findOrFail($typeRoomId);
        $cart = session()->get('bookingCart', []);
        if (isset($cart[$typeRoomId])) {
            $cart[$typeRoomId]['quantity'] += $quantity;
        } else {
            $cart[$typeRoomId] = [
                'room_type_id' => $typeRoomId,
                'quantity' => $quantity,
                'price_per_room' => $pricePerRoom,
                'adult' => $tr->adult,
                'children' => $tr->children,
                'room_type_name' => $tr->name,
            ];
        }

        session()->put('bookingCart', $cart);
        // $this->bookingCart = $cart;
    }

    public function render()
    {
        // session()->remove('bookingCart');
        $typeRooms = TypeRoom::where(
            'adult',
            '>=',
            $this->adult
        )->where(
                'children',
                '>=',
                $this->children
            )->get();

        return view(
            'livewire.layout.room-page',
            compact('typeRooms')
        );
    }
}
