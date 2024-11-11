<?php

namespace App\Livewire\Layout;

use App\Models\Room;
use App\Models\TypeRoom;
use Livewire\Component;

class DetailPage extends Component
{
    public $typeRoom;
    public function mount()
    {
        $typeRoomId = session()->get('getTypeRoomId');
        if ($typeRoomId) {
            $this->typeRoom = TypeRoom::with('room_images')->findOrFail($typeRoomId);
        }
        // else {
        //     abort(404);
        // }

    }

    public function render()
    {
        return view('livewire.layout.detail-page', [
            'typeRoom' => $this->typeRoom,
        ]);
    }
}
