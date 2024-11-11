<?php

namespace App\Livewire\Layout;

use App\Models\Room;
use App\Models\TypeRoom;
use Livewire\Component;

class RoomPage extends Component
{
    // public $typeRooms;

    public $adult = 0;
    public $children = 0;

    // public function mount()
    // {
    //     $this->typeRooms = TypeRoom::with('room_images')->get();
    // }

    // public function filterTypeRooms()
    // {

    // }

    public function getTypeRoomId($id)
    {
        session()->put('getTypeRoomId', $id);
        return redirect()->route('room.detail');
    }


    public function render()
    {

        $typeRooms = TypeRoom::where(
            'adult',
            '>=',
            $this->adult
        )->where(
                'children',
                '>=',
                $this->children
            )->get();

        return view(
            'livewire.layout.room-page',
            compact('typeRooms')
        );
    }
}
