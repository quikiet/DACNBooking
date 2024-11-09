<?php

namespace App\Livewire\Admin\Components;

use App\Livewire\Forms\RoomTypeForm;
use App\Models\TypeRoom;
use Livewire\Component;

class TypeRoomTable extends Component
{
    public $type_Rooms; // Khai báo thuộc tính để lưu trữ dữ liệu
    public RoomTypeForm $roomTypeForm;

    public $typeRoomId;
    public $name;
    public $price;
    public $adult;
    public $children;
    public $description;
    public function mount()
    {
        // Lấy tất cả kiểu phòng từ model
        $this->type_Rooms = TypeRoom::all();
    }

    public function add()
    {
        $this->validate();
        TypeRoom::create($this->roomTypeForm->pull());
        $this->type_Rooms = TypeRoom::all();
        session()->flash('message', 'Thêm loại phòng thành công!');
        $this->dispatch('close-modal');
    }

    public function getTypeID($id)
    {
        $this->typeRoomId = $id;
    }

    public function delete()
    {
        if ($this->typeRoomId) {
            TypeRoom::find($this->typeRoomId)->delete();
            $this->typeRoomId = null;
            $this->mount();
            session()->flash('message', 'Xoá loại phòng thành công!.');
        }
    }

    public function edit($id)
    {
        $TypeRoom = TypeRoom::find($id);
        $this->roomTypeForm->name = $TypeRoom->name;
        $this->roomTypeForm->price = $TypeRoom->price;
        $this->roomTypeForm->adult = $TypeRoom->adult;
        $this->roomTypeForm->children = $TypeRoom->children;
        $this->roomTypeForm->description = $TypeRoom->description;

        $this->typeRoomId = $TypeRoom->room_type_id;
    }

    public function update()
    {
        $isUpdated = false;
        // $typeRoom = TypeRoom::where('room_type_id', $this->typeRoomId);
        $typeRoom = TypeRoom::findOrFail($this->typeRoomId);
        if ($typeRoom) {
            if (
                $typeRoom->name !== $this->roomTypeForm->name
                || $typeRoom->price !== $this->roomTypeForm->price
                || $typeRoom->adult !== $this->roomTypeForm->adult
                || $typeRoom->children !== $this->roomTypeForm->children
                || $typeRoom->description !== $this->roomTypeForm->description
            ) {
                $typeRoom->update([
                    'name' => $this->roomTypeForm->name,
                    'price' => $this->roomTypeForm->price,
                    'adult' => $this->roomTypeForm->adult,
                    'children' => $this->roomTypeForm->children,
                    'description' => $this->roomTypeForm->description,
                ]);
                $isUpdated = true;
            }
        }
        if ($isUpdated) {
            session()->flash('message', "Cập nhật thành công");
        }
        $this->mount();
        $this->dispatch('close-modal');
    }

    public function render()
    {
        return view('livewire.admin.components.type-room-table', ['type_Rooms' => $this->type_Rooms]);
    }

}
