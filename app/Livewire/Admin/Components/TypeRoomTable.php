<?php

namespace App\Livewire\Admin\Components;

use App\Livewire\Forms\RoomTypeForm;
use App\Models\RoomImage;
use App\Models\TypeRoom;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Storage;

class TypeRoomTable extends Component
{

    use WithFileUploads;
    public $type_Rooms; // Khai báo thuộc tính để lưu trữ dữ liệu
    public RoomTypeForm $roomTypeForm;

    public $typeRoomId;
    public $name;
    public $price;
    public $adult;
    public $children;
    public $description;

    public $existingImages = [];
    #[Validate(['images.*' => 'image|max:1024'])]
    public $images = [];
    public function mount()
    {
        // Lấy tất cả kiểu phòng từ model
        $this->type_Rooms = TypeRoom::all();
    }

    public function add()
    {
        $this->validate();
        $Newtype_Rooms = TypeRoom::create($this->roomTypeForm->pull());
        $this->type_Rooms = TypeRoom::all();

        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                $imagePath = $image->store('room_images', 'public');
                RoomImage::create([
                    'room_type_id' => $Newtype_Rooms->room_type_id,
                    'image_url' => $imagePath,
                ]);
            }
        }

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
            $tr = TypeRoom::with('room_images')->findOrFail($this->typeRoomId);
            foreach ($tr->room_images as $image) {
                Storage::disk('public')->delete($image->image_url);
                $image->delete();
            }

            $tr->delete();
            $this->typeRoomId = null;
            $this->mount();
            session()->flash('message', 'Xoá loại phòng thành công!.');

        }
    }

    public function edit($id)
    {
        $TypeRoom = TypeRoom::with('room_images')->find($id);
        $this->roomTypeForm->name = $TypeRoom->name;
        $this->roomTypeForm->price = $TypeRoom->price;
        $this->roomTypeForm->adult = $TypeRoom->adult;
        $this->roomTypeForm->children = $TypeRoom->children;
        $this->roomTypeForm->description = $TypeRoom->description;

        //The pluck method get all of the values for a same key:
        $this->existingImages = $TypeRoom->room_images->pluck('image_url')->toArray();

        $this->typeRoomId = $id;
    }

    public function update()
    {
        $isUpdated = false;
        // $typeRoom = TypeRoom::where('room_type_id', $this->typeRoomId);
        $typeRoom = TypeRoom::with('room_images')->findOrFail($this->typeRoomId);
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
                if ($this->images) {

                    foreach ($typeRoom->room_images as $image) {
                        Storage::disk('public')->delete($image->image_url);
                        $image->delete();
                    }

                    foreach ($this->images as $image) {
                        $imagePath = $image->store('room_images', 'public');
                        RoomImage::create([
                            'room_type_id' => $this->typeRoomId,
                            'image_url' => $imagePath,
                        ]);
                    }
                }
                $isUpdated = true;
            }
        }
        if ($isUpdated) {
            session()->flash('message', "Cập nhật thành công");
        }
        $this->mount();
        $this->dispatch('close-modal');
    }

    public function resetField()
    {
        $this->reset();
        $this->typeRoomId = null;
        $this->images = [];
    }

    public function render()
    {
        return view('livewire.admin.components.type-room-table', ['type_Rooms' => $this->type_Rooms]);
    }

}
