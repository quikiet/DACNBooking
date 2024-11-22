<?php

namespace App\Livewire\Admin\Components;

use App\Livewire\Forms\RoomTypeForm;
use App\Models\RoomImage;
use App\Models\TypeRoom;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Mary\Traits\Toast;
use Storage;

class TypeRoomTable extends Component
{

    use WithFileUploads;
    use Toast;
    use WithPagination;
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

    public function add()
    {
        $this->validate();
        $Newtype_Rooms = TypeRoom::create($this->roomTypeForm->pull());

        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                $imagePath = $image->store('room_images', 'public');
                RoomImage::create([
                    'room_type_id' => $Newtype_Rooms->room_type_id,
                    'image_url' => $imagePath,
                ]);
            }
        }

        $this->success("Thêm phòng mới thành công!", "Phòng mới đã được thêm thành công", "toast-top toast-center");

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

            $this->success("Xoá phòng thành công!", "Bạn đã xoá phòng thành công", "toast-top toast-center");

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
            $this->success("Cập nhật thành công!", "Bạn đã cập nhật kiểu phòng thành công", "toast-top toast-center");
        }

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
        $type_Rooms = TypeRoom::paginate(5);
        return view('livewire.admin.components.type-room-table', ['type_Rooms' => $type_Rooms]);
    }

}
