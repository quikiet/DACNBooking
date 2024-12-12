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
    public $check_in;
    public $check_out;
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
        $this->bookingCart = session()->remove('bookingCart', []);
        // $this->bookingCart = session()->get('bookingCart');

        $this->check_in = now()->toDateString();
        $this->check_out = now()->addDay()->toDateString();

        foreach ($this->typeRooms as $typeRoom) {
            $this->quantities[$typeRoom->room_type_id] = 1;
        }

    }

    public function searchRooms()
    {
        $this->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
        ]);

        // Lọc các loại phòng đã có phòng trống trong khoảng thời gian này
        $this->typeRooms = TypeRoom::with([
            'rooms' => function ($query) {
                $query->whereDoesntHave('bookings', function ($query) {
                    $query->where(function ($q) {
                        $q->whereBetween('check_in', [$this->check_in, $this->check_out]) // Kiểm tra phòng đã đặt
                            ->orWhereBetween('check_out', [$this->check_in, $this->check_out])
                            ->orWhere(function ($q) {
                                $q->where('check_in', '<=', $this->check_in)
                                    ->where('check_out', '>=', $this->check_out); // Khoảng thời gian chồng lấp
                            });
                    });
                });
            }
        ])->get();
    }

    public function addToCart($roomTypeId, $quantity, $price)
    {
        $typeRoom = TypeRoom::findOrFail($roomTypeId);
        $availableRooms = session()->get("available_rooms.$roomTypeId", $typeRoom->available_rooms_count);
        $image = $typeRoom->room_images->first()?->image_url;
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
                    'description' => $typeRoom->description,
                    'image' => $image,
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
