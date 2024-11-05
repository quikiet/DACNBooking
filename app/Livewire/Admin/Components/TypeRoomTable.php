<?php

namespace App\Livewire\Admin\Components;

use App\Models\TypeRoom;
use Livewire\Component;

class TypeRoomTable extends Component
{
    public $type_Rooms; // Khai báo thuộc tính để lưu trữ dữ liệu
    public function mount()
    {
        // Lấy tất cả kiểu phòng từ model
        $this->type_Rooms = TypeRoom::all();
    }
    public function render()
    {
        return view('livewire.admin.components.type-room-table', ['type_Rooms' => $this->type_Rooms]);
    }

}
