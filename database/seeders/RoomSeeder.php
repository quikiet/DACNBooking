<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Room::create([
            'name' => 'Phòng 101',
            'room_number' => '101',
            'status' => 'available',
            'room_type_id' => 1,
        ]);

        Room::create([
            'name' => 'Phòng 102',
            'room_number' => '102',
            'status' => 'available',
            'room_type_id' => 1,
        ]);

        Room::create([
            'name' => 'Phòng 201',
            'room_number' => '201',
            'status' => 'occupied',
            'room_type_id' => 2,
        ]);

        Room::create([
            'name' => 'Phòng 202',
            'room_number' => '202',
            'status' => 'available',
            'room_type_id' => 2,
        ]);

        Room::create([
            'name' => 'Phòng 301',
            'room_number' => '301',
            'status' => 'available',
            'room_type_id' => 3,
        ]);
    }
}
