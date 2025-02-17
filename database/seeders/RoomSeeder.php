<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class RoomSeeder extends Seeder
{


    public function run(): void
    {
        $faker = Faker::create(); // Khởi tạo Faker

        // Tạo dữ liệu ngẫu nhiên cho 50 phòng
        foreach (range(1, 50) as $index) {
            Room::create([
                'name' => 'Phòng ' . $faker->numberBetween(100, 999), // Tên phòng ngẫu nhiên
                'room_number' => $faker->numberBetween(100, 999), // Số phòng ngẫu nhiên
                'status' => $faker->randomElement(['available', 'booked', 'fixing', 'occupied']), // Trạng thái phòng ngẫu nhiên
                'room_type_id' => $faker->numberBetween(1, 9), // Loại phòng ngẫu nhiên (giả sử có 4 loại phòng)
            ]);
        }
    }


    // public function run(): void
    // {
    //     Room::create([
    //         'name' => 'Phòng 101',
    //         'room_number' => '101',
    //         'status' => 'available',
    //         'room_type_id' => 1,
    //     ]);

    //     Room::create([
    //         'name' => 'Phòng 102',
    //         'room_number' => '102',
    //         'status' => 'available',
    //         'room_type_id' => 1,
    //     ]);

    //     Room::create([
    //         'name' => 'Phòng 201',
    //         'room_number' => '201',
    //         'status' => 'occupied',
    //         'room_type_id' => 2,
    //     ]);

    //     Room::create([
    //         'name' => 'Phòng 202',
    //         'room_number' => '202',
    //         'status' => 'available',
    //         'room_type_id' => 2,
    //     ]);

    //     Room::create([
    //         'name' => 'Phòng 301',
    //         'room_number' => '301',
    //         'status' => 'available',
    //         'room_type_id' => 3,
    //     ]);
    // }
}
