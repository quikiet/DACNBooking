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

use Livewire\WithPagination;
use Mary\Traits\Toast;
use Storage;

class RoomTable extends Component
{
    use WithFileUploads;
    use WithPagination;
    public RoomForm $roomForm;
    public RoomTypeForm $roomTypeForm;
    // public $rooms;
    use Toast;

    public $roomId;

    public $room_type_id;

    public $name;
    public $room_number;
    public $status;

    public $search;

    public function add()
    {
        $this->roomForm->validate();
        Room::create([
            'name' => $this->roomForm->name,
            'room_number' => $this->roomForm->room_number,
            'status' => $this->roomForm->status,
            'room_type_id' => $this->roomForm->room_type_id,
        ]);
        $this->resetField();
        $this->success("Thêm phòng mới thành công!", "Phòng mới đã được thêm thành công", "toast-top toast-center");
        $this->dispatch('close-modal');
    }

    public function getRoomId($id)
    {
        $this->roomId = $id;
    }

    public function delete()
    {
        if ($this->roomId) {
            $room = Room::findOrFail($this->roomId);

            $room->delete();

            // $this->dispatch('close-modal');

            $this->dispatch('show-toast');
            $this->success("Xoá phòng", "Phòng mới đã được xoá thành công", "toast-top toast-center");

        }

    }

    public function edit($id)
    {
        $Room = Room::findOrFail($id);
        $this->roomForm->name = $Room->name;
        $this->roomForm->room_number = $Room->room_number;
        $this->roomForm->status = $Room->status;
        $this->roomForm->room_type_id = $Room->room_type_id;

        $this->roomId = $id;
    }

    public function update()
    {

        $isUpdated = false;
        // $this->validate();
        $room = Room::findOrFail($this->roomId);
        if ($room) {
            if (
                $room->name !== $this->roomForm->name
                || $room->room_number !== $this->roomForm->room_number
                || $room->status !== $this->roomForm->status
                || $room->room_type_id !== $this->roomForm->room_type_id
            ) {
                $room->update([
                    'name' => $this->roomForm->name,
                    'room_number' => $this->roomForm->room_number,
                    'status' => $this->roomForm->status,
                    'room_type_id' => $this->roomForm->room_type_id,
                ]);
                $isUpdated = true;
            }

            if ($isUpdated) {
                $this->resetField();
                $this->success("Cập nhật phòng mới", "Phòng mới đã được cập nhật thành công", "toast-top toast-center");
            }
        }
        $this->dispatch('close-modal');
    }

    public function resetField()
    {
        $this->roomForm->name = '';
        $this->roomForm->room_number = '';
        $this->roomForm->room_type_id = '';

        // Reset các thuộc tính khác
        $this->roomId = null;
        if (!$this->roomId) {
            $this->roomForm->status = 'available';
        }
    }

    public function render()
    {
        if (is_null($this->roomForm->status)) {
            $this->roomForm->status = 'available';
        }
        $rooms = Room::with('typeRoom')->Where('room_number', 'like', "%{$this->search}%")
            ->orWhere('status', 'like', "%{$this->search}%")
            ->paginate(5);
        $typeRooms = TypeRoom::all();
        return view('livewire.admin.components.room-table', [
            'rooms' => $rooms,
            'typeRooms' => $typeRooms,
        ]);
    }
}
