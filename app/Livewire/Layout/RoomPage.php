<?php

namespace App\Livewire\Layout;

use App\Models\Booking;
use App\Models\BookingDetail;
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

        if ($this->check_in && $this->check_out) {
            // Lọc các loại phòng chưa bị đặt trong khoảng thời gian check_in và check_out
            $roomTypes = TypeRoom::whereDoesntHave('rooms.bookings', function ($query) {
                $query->where(function ($q) {
                    // Kiểm tra bookings có check_in và check_out trong khoảng thời gian
                    $q->whereBetween('check_in', [$this->check_in, $this->check_out])
                        ->orWhereBetween('check_out', [$this->check_in, $this->check_out])
                        ->orWhere(function ($q) {
                            // Kiểm tra booking vượt qua khoảng thời gian
                            $q->where('check_in', '<', $this->check_in)
                                ->where('check_out', '>', $this->check_out);
                        });
                });
            })
                ->get();

            // Tính toán số lượng phòng còn trống cho mỗi loại phòng
            foreach ($roomTypes as $roomType) {
                // Đếm số lượng phòng đã đặt trong khoảng thời gian
                $bookedRooms = $roomType->rooms()->whereHas('bookings', function ($q) {
                    $q->where(function ($q) {
                        $q->whereBetween('check_in', [$this->check_in, $this->check_out])
                            ->orWhereBetween('check_out', [$this->check_in, $this->check_out])
                            ->orWhere(function ($q) {
                                $q->where('check_in', '<', $this->check_in)
                                    ->where('check_out', '>', $this->check_out);
                            });
                    });
                })->count();

                // Tính số lượng phòng còn trống cho loại phòng này
                $roomType->available_rooms_count = $roomType->available_rooms_count - $bookedRooms;

                // Đảm bảo không có số phòng âm
                if ($roomType->available_rooms_count < 0) {
                    $roomType->available_rooms_count = 0;
                }
            }

            return $roomTypes;
        }

        return [];
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

            session()->put('bookingCart', $cart);
        } else {
            $this->error("Phòng không còn trống!", "Đã hết số lượng phòng này. Xin vui lòng chọn kiểu phòng khác.", "toast-top toast-end");
        }
    }

    public function render()
    {
        // session()->flush();
        $this->typeRooms = TypeRoom::query()
            ->when($this->adult, function ($query) {
                return $query->where('adult', '>=', $this->adult);
            })
            ->when($this->children, function ($query) {
                return $query->where('children', '>=', $this->children);
            })
            ->get();


        $rooms = $this->searchRooms();
        return view('livewire.layout.room-page', ['typeRooms' => $this->typeRooms, 'rooms' => $rooms]);
    }
}
