<?php

namespace App\Livewire\Admin\Components;

use App\Livewire\Forms\RoomTypeForm;
use App\Models\TypeRoom;
use Livewire\Component;

class TypeRoomTable extends Component
{
    public $type_Rooms; // Khai báo thuộc tính để lưu trữ dữ liệu
    public RoomTypeForm $romeTypeForm;

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
        TypeRoom::create($this->romeTypeForm->pull());
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
        $this->typeRoomId = $TypeRoom->room_type_id;
        $this->romeTypeForm->name = $TypeRoom->name;
        $this->romeTypeForm->price = $TypeRoom->price;
        $this->romeTypeForm->adult = $TypeRoom->adult;
        $this->romeTypeForm->children = $TypeRoom->children;
        $this->romeTypeForm->description = $TypeRoom->description;
    }

    public function update()
    {
        $this->validate();
        TypeRoom::where('room_type_id', $this->typeRoomId)->update([
            'name' => $this->romeTypeForm->name,
            'price' => $this->romeTypeForm->price,
            'adult' => $this->romeTypeForm->adult,
            'children' => $this->romeTypeForm->children,
            'description' => $this->romeTypeForm->description,
        ]);
        session()->flash('message', "Cập nhật thành công");
        $this->dispatch('close-modal');
        $this->mount();
    }

    public function render()
    {
        return view('livewire.admin.components.type-room-table', ['type_Rooms' => $this->type_Rooms]);
    }

}
