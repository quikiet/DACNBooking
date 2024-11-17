<?php

namespace App\Livewire\Layout;

use App\Models\Room;
use App\Models\TypeRoom;
use Livewire\Component;
use Mary\Traits\Toast;

class RoomPage extends Component
{
    public $typeRooms;
    use Toast;
    public $adult = 0;
    public $children = 0;

    public $bookingCart = [];

    public $quantities = [];

    public function mount()
    {
        $this->typeRooms = TypeRoom::all();

        foreach ($this->typeRooms as $typeRoom) {
            $this->quantities[$typeRoom->room_type_id] = 1;
        }
    }

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


        $this->quantities[$typeRoomId] = 1;

        session()->put('bookingCart', $cart);
        $this->dispatch('refreshCart');
        // $this->bookingCart = $cart;
    }

    public function render()
    {
        // Lọc loại phòng dựa trên số lượng khách
        $this->typeRooms = TypeRoom::where('adult', '>=', $this->adult)
            ->where('children', '>=', $this->children)
            ->get();

        return view('livewire.layout.room-page', ['typeRooms' => $this->typeRooms]);
    }
}
