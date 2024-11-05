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

    public function add(){
        $this->validate();
        TypeRoom::create($this->romeTypeForm->pull());
        $this->type_Rooms = TypeRoom::all();
        session()->flash('message','Thêm loại phòng thành công!');
        $this->dispatch('close-modal');
    }

    public function getTypeID($id){
        $this->typeRoomId = $id;
    }

    public function delete(){
        if($this->typeRoomId){
            TypeRoom::find($this->typeRoomId)->delete();
            $this->typeRoomId = null;
            $this->mount();
            session()->flash('message', 'Xoá loại phòng thành công!.');
        }
    }

    public function edit($id){
        $this->typeRoomId = $id;
        $this->name = $this->romeTypeForm->name;
        $this->price = $this->romeTypeForm->price;
        $this->adult = $this->romeTypeForm->adult;
        $this->children = $this->romeTypeForm->children;
        $this->description = $this->romeTypeForm->description;
    }

    public function render()
    {
        return view('livewire.admin.components.type-room-table', ['type_Rooms' => $this->type_Rooms]);
    }

}
