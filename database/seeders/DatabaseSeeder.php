<?php

namespace Database\Seeders;

use App\Models\RoomImage;
use App\Models\TypeRoom;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test Admin',
            'email' => 'example@gmail.com',
            'password' => '123456',
            'roles' => true
        ]);

        $this->call(TypeRoomSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(room_images::class);

        // TypeRoom::all()->each(function ($typeRoom) {
        //     $typeRoom->quantity = $typeRoom->rooms()->count(); // Tổng số phòng từ bảng rooms
        //     $typeRoom->available_rooms_count = $typeRoom->rooms()->where('status', 'available')->count(); // Tổng số phòng khả dụng
        //     $typeRoom->save();
        // });
    }
}
