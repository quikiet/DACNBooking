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
use Storage;

class RoomTable extends Component
{
    use WithFileUploads;

    public RoomForm $roomForm;
    public RoomTypeForm $roomTypeForm;
    public $rooms;

    public $room_type_id;

    #[Validate(['images.*' => 'image|max:10240'])]
    public $images = [];

    public function add()
    {
        // $this->validate();
        $room = Room::create($this->roomForm->pull(
            [
                'name',
                'room_number',
                'room_type_id',
            ]
        ));

        if (!empty($this->images)) {
            foreach ($this->images as $image) {
                $imagePath = $image->store('room_images', 'public');
                RoomImage::create([
                    'room_id' => $room->room_id,
                    'image_url' => $imagePath,
                ]);
            }
        }
        $this->images = [];
        session()->flash('message', 'Thêm phòng mới thành công!');
        $this->dispatch('close-modal');
    }

    public $roomId;
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

            session()->flash('deleteMessage', 'Xoá phòng thành công!');

        }

    }

    public function render()
    {
        $this->rooms = Room::with('typeRoom')->get();
        $typeRooms = TypeRoom::all();
        return view('livewire.admin.components.room-table', [
            'rooms' => $this->rooms,
            'typeRooms' => $typeRooms,
        ]);
    }
}
