<?php

namespace App\Livewire\Admin\Components;

use App\Models\Booking;
use App\Models\Room;
use App\Models\TypeRoom;
use App\Models\User;
use Arr;
use Livewire\Component;
use Livewire\WithPagination;

class HomeDash extends Component
{
    use WithPagination;
    public array $rooms_chart = [];

    public function mount()
    {
        $rooms = Room::all();
        $roomBooked = $rooms->where('status', 'booked')->count();
        $roomFixing = $rooms->where('status', 'fixing')->count();
        $roomOccupied = $rooms->where('status', 'occupied')->count();
        $roomAvailable = $rooms->where('status', 'available')->count();

        // Đảm bảo đúng cấu trúc dữ liệu của Chart.js
        $this->rooms_chart = [
            'type' => 'bar', // Loại biểu đồ
            'data' => [
                'labels' => ['Phòng đã đặt', 'Phòng còn trống', 'Phòng đang sửa chữa', 'Phòng đang sử dụng'], // Nhãn cho biểu đồ
                'datasets' => [
                    [
                        'label' => ['Phòng'],
                        'data' => [$roomBooked, $roomAvailable, $roomFixing, $roomOccupied], // Dữ liệu
                        'backgroundColor' => ['#CC3333', '#9EEA67', '#6198CC', '#EA9E67'], // Màu sắc cho từng phần
                    ]
                ]
            ],
        ];
    }

    public function render()
    {
        $userCount = User::count();
        $bookingCount = Booking::count();
        $roomTypeCount = TypeRoom::count();
        $roomCount = Room::count();
        return view('livewire.admin.components.home-dash', compact('userCount', 'bookingCount', 'roomTypeCount', 'roomCount'));
    }
}
