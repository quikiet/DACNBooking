<?php

namespace App\Livewire\Admin\Components;

use App\Models\Room;
use App\Models\TypeRoom;
use App\Models\User;
use Livewire\Component;

class SearchUser extends Component
{

    public $search = '';

    public $selectedUser = null;
    public $name = '';
    public $phone_number = '';
    public $email = '';

    public $selected_type_room;
    public $type_room_id;
    public $selected_price;
    public $room_types;
    public function mount()
    {
        // Lấy danh sách kiểu phòng khi component được tải
        $this->room_types = TypeRoom::all();
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



    public function render()
    {
        $users = User::where('name', 'like', "%{$this->search}%")
            ->orWhere('email', 'like', "%{$this->search}%")->get();
        return view('livewire.admin.components.search-user', [
            "users" => $users,
        ]);
    }
}
