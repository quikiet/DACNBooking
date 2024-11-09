<?php

namespace App\Livewire\Admin\Components;

use App\Livewire\Forms\RoomForm;
use App\Livewire\Forms\RoomTypeForm;
use App\Models\Room;
use App\Models\RoomImage;
use App\Models\TypeRoom;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Storage;

class RoomTable extends Component
{
    use WithFileUploads;
    use WithPagination, WithoutUrlPagination;
    public RoomForm $roomForm;
    public RoomTypeForm $roomTypeForm;
    // public $rooms;
    public $roomId;

    public $room_type_id;

    public $name;
    public $room_number;
    public $status;

    public $existingImages = [];
    #[Validate(['images.*' => 'image|max:1024'])]
    public $images = [];
    public function add()
    {
        $this->roomForm->validate();
        $room = Room::create([
            'name' => $this->roomForm->name,
            'room_number' => $this->roomForm->room_number,
            'status' => $this->roomForm->status,
            'room_type_id' => $this->roomForm->room_type_id,
        ]);


        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                $imagePath = $image->store('room_images', 'public');
                RoomImage::create([
                    'room_id' => $room->room_id,
                    'image_url' => $imagePath,
                ]);
            }
        }
        $this->resetField();
        session()->flash('SuccessMes', 'Thêm phòng mới thành công!');
        $this->dispatch('show-toast');
        $this->dispatch('close-modal');
    }

    public function getRoomId($id)
    {
        $this->roomId = $id;
    }

    public function delete()
    {
        if ($this->roomId) {
            $room = Room::with('room_images')->findOrFail($this->roomId);

            foreach ($room->room_images as $image) {
                Storage::disk('public')->delete($image->image_url);
            }

            RoomImage::where('room_id', $this->roomId)->delete();

            $room->delete();

            // $this->dispatch('close-modal');

            $this->dispatch('show-toast');
            session()->flash('SuccessMes', 'Xoá phòng thành công!');

        }

    }

    public function edit($id)
    {
        $Room = Room::with('room_images')->findOrFail($id);
        $this->roomForm->name = $Room->name;
        $this->roomForm->room_number = $Room->room_number;
        $this->roomForm->status = $Room->status;
        $this->roomForm->room_type_id = $Room->room_type_id;

        //The pluck method get all of the values for a same key:
        $this->existingImages = $Room->room_images->pluck('image_url')->toArray();

        $this->roomId = $id;
    }

    public function update()
    {
        // $this->validate();
        $room = Room::with('room_images')->findOrFail($this->roomId);
        $room->update([
            'name' => $this->roomForm->name,
            'room_number' => $this->roomForm->room_number,
            'status' => $this->roomForm->status,
            'room_type_id' => $this->roomForm->room_type_id,
        ]);

        if ($this->images) {

            foreach ($room->room_images as $image) {
                Storage::disk('public')->delete($image->image_url);
                $image->delete();
            }

            foreach ($this->images as $image) {
                $imagePath = $image->store('room_images', 'public');
                RoomImage::create([
                    'room_id' => $this->roomId,
                    'image_url' => $imagePath,
                ]);
            }
        }
        $this->resetField();
        session()->flash('SuccessMes', 'Cập nhật phòng thành công!');
        $this->dispatch('show-toast');
        $this->dispatch('close-modal');
    }

    public function resetField()
    {
        $this->roomForm->name = '';
        $this->roomForm->room_number = '';
        $this->roomForm->room_type_id = '';

        // Reset các thuộc tính khác
        $this->roomId = null;
        $this->existingImages = [];
        $this->images = [];
        if (!$this->roomId) {
            $this->roomForm->status = 'available';
        }
    }

    public function render()
    {
        if (is_null($this->roomForm->status)) {
            $this->roomForm->status = 'available';
        }
        // $this->rooms = Room::with('typeRoom', 'room_images')->get();
        $rooms = Room::with('typeRoom', 'room_images')->paginate(5);
        $typeRooms = TypeRoom::all();
        return view('livewire.admin.components.room-table', [
            'rooms' => $rooms,
            'typeRooms' => $typeRooms,
        ]);
    }
}
