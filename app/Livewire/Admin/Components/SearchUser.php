<?php

namespace App\Livewire\Admin\Components;

use App\Models\checkin_details;
use App\Models\checkin_form;
use App\Models\Room;
use App\Models\TypeRoom;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Mary\Traits\Toast;

class SearchUser extends Component
{
    use WithPagination;

    use Toast;
    public $search = '';

    public $selectedUser = null;
    public $name = '';
    public $phone_number = '';
    public $email = '';

    public $rooms;

    public $selected_type_room;
    public $selected_room_amount;
    public $amount;
    public $type_room_id;
    public $price;
    public $room_types;

    public $check_in;
    public $check_out;

    public $total_pay;

    public $notes;

    public $roomsInfo = [];

    public $rules = [
        'check_in' => 'required|date|after_or_equal:today',
        'check_out' => 'required|date|after:check_in',
    ];
    public function mount()
    {
        // Lấy danh sách kiểu phòng khi component được tải
        $this->room_types = TypeRoom::all();
        if ($this->room_types->isNotEmpty()) {
            $this->type_room_id = $this->room_types->first()->room_type_id;
            $this->updatePrice();
            $this->updateRooms();
        }
        $this->check_in = now()->toDateString();
        $this->check_out = now()->addDay()->toDateString();
        $this->selected_room_amount = 0;
        $this->amount = 0;
        $this->total_pay = 0;
        $this->notes = '';
    }


    public function selectUser($userId)
    {
        $user = User::find($userId);
        if ($user) {
            $this->selectedUser = $user;
            $this->name = $user->name;
            $this->phone_number = $user->phone_number;
            $this->email = $user->email;
        }
    }

    public function selectRoomAmount()
    {
        $this->amount = $this->selected_room_amount;
    }

    public function updatedTypeRoomId()
    {
        $this->updatePrice();
        $this->updateRooms();
        $this->updateRoomsInfoPrice();
    }

    public function updateRoomsInfoPrice()
    {
        // Cập nhật giá mới cho tất cả các phòng trong roomsInfo
        foreach ($this->roomsInfo as &$room) {
            $room['price'] = $this->price;
        }
    }

    public function updatedSelectedRoomAmount()
    {
        $this->roomsInfo = [];
        for ($i = 0; $i < $this->selected_room_amount; $i++) {
            $this->roomsInfo[] = [
                'check_in' => $this->check_in,
                'check_out' => $this->check_out,
                'room_id' => null,
                'type_room_id' => $this->type_room_id,
                'price' => $this->price,
                'available_rooms' => Room::where('room_type_id', $this->type_room_id)
                    ->where('status', 'available')
                    ->get(['room_id', 'name']),
            ];
        }
        $this->calculateTotalPay();
    }

    public function updateRoomInfoPrice($index)
    {
        $selectedTypeRoom = TypeRoom::find($this->roomsInfo[$index]['type_room_id']);
        if ($selectedTypeRoom) {
            $this->roomsInfo[$index]['price'] = $selectedTypeRoom->price;
            $this->updateRooms();
        }
        $this->updateRoomOptions($index);
        $this->calculateTotalPay();
    }

    public function updateRoomOptions($index)
    {
        $selectedTypeRoomId = $this->roomsInfo[$index]['type_room_id'] ?? null;

        if ($selectedTypeRoomId) {
            $availableRooms = Room::where('room_type_id', $selectedTypeRoomId)
                ->where('status', 'available')
                ->get(['room_id', 'name']);

            // 2. Cập nhật danh sách phòng trống vào roomsInfo
            $this->roomsInfo[$index]['available_rooms'] = $availableRooms;

            // 3. Gán phòng đầu tiên vào room_id (nếu có)
            if ($availableRooms->isNotEmpty()) {
                $this->roomsInfo[$index]['room_id'] = $availableRooms->first()->room_id;
            } else {
                $this->roomsInfo[$index]['room_id'] = null; // Không có phòng nào
            }
            $typeRoom = TypeRoom::find($selectedTypeRoomId);
            $this->roomsInfo[$index]['price'] = $typeRoom ? $typeRoom->price : 0;
        } else {
            // Trường hợp không có type_room_id: gán giá trị mặc định
            $this->roomsInfo[$index]['available_rooms'] = [];
            $this->roomsInfo[$index]['room_id'] = null;
            $this->roomsInfo[$index]['price'] = 0;
        }
    }

    public function saveCheckInForm()
    {
        $this->validate();
        if (!$this->selectedUser) {
            $this->error('Vui lòng chọn người dùng trước khi lưu.');
            return;
        }

        try {
            $checkin_form = checkin_form::create([
                'user_id' => $this->selectedUser->id ?? null,
                'type_room_id' => $this->roomsInfo[0]['type_room_id'],
                'total_pay' => $this->calculateTotalPayForForm(),
                'notes' => $this->notes,
            ]);
            foreach ($this->roomsInfo as $room) {
                if (!$room['room_id']) {
                    $this->error('Vui lòng chọn phòng trước khi lưu.');
                    $checkin_form->detele('checkin_id', );
                    return; // Dừng nếu thiếu room_id
                } else {

                    $checkInDate = Carbon::parse($room['check_in']);
                    $checkOutDate = Carbon::parse($room['check_out']);
                    $numberOfNights = $checkInDate->diffInDays($checkOutDate);
                    if ($checkInDate > $checkOutDate) {
                        return;
                    }
                    checkin_details::create([
                        'checkin_id' => $checkin_form->getKey(),
                        'room_id' => $room['room_id'], // Đảm bảo room_id đã chọn
                        'price_per_night' => $room['price'],
                        'checkin_date' => $checkInDate,
                        'expectedCheckOutDate' => $checkOutDate,
                        'number_of_night' => $numberOfNights,
                        'sub_total' => $room['price'] * $numberOfNights,
                    ]);

                    Room::where('room_id', $room['room_id'])->update(['status' => 'booked']);
                }
            }

            redirect(route('admin.checkin'))->with('success', 'Phiếu thuê và chi tiết đã được lưu thành công!');
        } catch (\Throwable $e) {
            if (isset($checkin_form)) {
                $checkin_form->delete();
            }
            $this->error('Đã xảy ra lỗi khi lưu phiếu thuê');
        }
    }

    private function calculateTotalPayForForm()
    {
        $total = 0;
        foreach ($this->roomsInfo as $room) {
            $checkInDate = Carbon::parse($room['check_in']);
            $checkOutDate = Carbon::parse($room['check_out']);
            $numberOfNights = $checkInDate->diffInDays($checkOutDate);
            $total += $room['price'] * $numberOfNights;
        }
        return $total;
    }

    public function calculateTotalPay()
    {
        $this->total_pay = 0;
        foreach ($this->roomsInfo as $room) {
            // Đảm bảo sử dụng đúng giá của mỗi phòng
            $this->total_pay += $room['price'] ?? 0;
        }
    }

    public function updatePrice()
    {
        $roomType = TypeRoom::find($this->type_room_id);
        $this->price = $roomType ? $roomType->price : null;
    }

    public function updateRooms()
    {
        $this->rooms = Room::where('room_type_id', $this->type_room_id)->where('status', 'available')->get();
    }



    public function render()
    {
        $users = User::where('name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")->paginate(5);

        $room_amount = Room::where('status', 'available')->count();
        return view('livewire.admin.components.search-user', [
            "users" => $users,
            "room_amount" => $room_amount,
            "amount" => $this->amount,
        ]);
    }
}
