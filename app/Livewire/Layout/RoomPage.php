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

    // protected $listeners = ['refreshPage' => 'refresh'];


    // public function refresh()
    // {
    //     $this->bookingCart = session()->get('bookingCart', []);
    // }

    public function mount()
    {
        $this->typeRooms = TypeRoom::all();

        foreach ($this->typeRooms as $typeRoom) {
            $this->quantities[$typeRoom->room_type_id] = 1;
        }
    }

    // public function addToCart($typeRoomId, $quantity, $pricePerRoom)
    // {

    //     $tr = TypeRoom::findOrFail($typeRoomId);
    //     $cart = session()->get('bookingCart', []);
    //     if (isset($cart[$typeRoomId])) {
    //         $cart[$typeRoomId]['quantity'] += $quantity;
    //     } else {
    //         $cart[$typeRoomId] = [
    //             'room_type_id' => $typeRoomId,
    //             'quantity' => $quantity,
    //             'price_per_room' => $pricePerRoom,
    //             'adult' => $tr->adult,
    //             'children' => $tr->children,
    //             'room_type_name' => $tr->name,
    //         ];
    //     }


    //     $this->quantities[$typeRoomId] = 1;

    //     session()->put('bookingCart', $cart);
    //     $this->dispatch('refreshCart');
    //     // $this->bookingCart = $cart;
    // }

    // public function addToCart($roomTypeId, $quantity, $price)
    // {
    //     $typeRoom = TypeRoom::findOrFail($roomTypeId);

    //     $availableRooms = session()->get("available_rooms.$roomTypeId", $typeRoom->available_rooms_count);

    //     if ($availableRooms >= $quantity) {

    //         $cart = session()->get('bookingCart', []);
    //         if (isset($cart[$roomTypeId])) {
    //             $cart[$roomTypeId]['quantity'] += $quantity;
    //         } else {
    //             $cart[$roomTypeId] = [
    //                 'room_type_id' => $roomTypeId,
    //                 'quantity' => $quantity,
    //                 'price_per_room' => $price,
    //                 'adult' => $typeRoom->adult,
    //                 'children' => $typeRoom->children,
    //                 'room_type_name' => $typeRoom->name,
    //             ];
    //         }

    //         // Giảm tạm thời số lượng phòng có sẵn trong phiên
    //         session()->put("available_rooms.$roomTypeId", $availableRooms - $quantity);

    //         session()->put('bookingCart', $cart);
    //         $this->dispatch('refreshCart');
    //     } else {
    //         $this->error("Phòng không còn trống!", "Đã hết số lượng phòng này. Xin vui lòng chọn kiểu phòng khác.", "toast-top toast-end");
    //     }
    // }

    public function addToCart($roomTypeId, $quantity, $price)
    {
        $typeRoom = TypeRoom::findOrFail($roomTypeId);
        $availableRooms = session()->get("available_rooms.$roomTypeId", $typeRoom->available_rooms_count);

        if ($availableRooms >= $quantity) {

            $cart = session()->get('bookingCart', []);
            if (isset($cart[$roomTypeId])) {
                $cartCheck = $cart[$roomTypeId]['quantity'] + $quantity;
                if ($cartCheck <= $availableRooms) {
                    $cart[$roomTypeId]['quantity'] += $quantity;
                    $this->dispatch('refreshCart');
                } else {
                    $this->error("Phòng không còn trống!", "Đã hết số lượng phòng này. Xin vui lòng chọn kiểu phòng khác.", "toast-top toast-end");
                }
            } else {
                $cart[$roomTypeId] = [
                    'room_type_id' => $roomTypeId,
                    'quantity' => $quantity,
                    'price_per_room' => $price,
                    'adult' => $typeRoom->adult,
                    'children' => $typeRoom->children,
                    'room_type_name' => $typeRoom->name,
                ];
                $this->dispatch('refreshCart');
            }
            // Giảm tạm thời số lượng phòng có sẵn trong phiên
            // session()->put("available_rooms.$roomTypeId", $availableRooms - $quantity);

            session()->put('bookingCart', $cart);
        } else {
            $this->error("Phòng không còn trống!", "Đã hết số lượng phòng này. Xin vui lòng chọn kiểu phòng khác.", "toast-top toast-end");
        }
    }

    public function render()
    {
        // session()->flush();
        // Lọc loại phòng dựa trên số lượng khách
        $this->typeRooms = TypeRoom::where('adult', '>=', $this->adult)
            ->where('children', '>=', $this->children)
            ->get();

        return view('livewire.layout.room-page', ['typeRooms' => $this->typeRooms]);
    }
}
