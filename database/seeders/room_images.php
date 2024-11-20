<?php

namespace Database\Seeders;

use App\Models\RoomImage;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class room_images extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('room_images')->insert([
            [
                'room_type_id' => 1,
                'image_url' => 'room_images/default/png1.jpg',
            ],
            [
                'room_type_id' => 2,
                'image_url' => 'room_images/default/png2.jpg',
            ],
            [
                'room_type_id' => 3,
                'image_url' => 'room_images/default/png3.jpg',
            ],
            [
                'room_type_id' => 4,
                'image_url' => 'room_images/default/png4.jpg',
            ],
            [
                'room_type_id' => 5,
                'image_url' => 'room_images/default/png5.jpg',
            ],
            [
                'room_type_id' => 6,
                'image_url' => 'room_images/default/png6.jpg',
            ],
            [
                'room_type_id' => 7,
                'image_url' => 'room_images/default/png7.jpg',
            ],
            [
                'room_type_id' => 8,
                'image_url' => 'room_images/default/png8.jpg',
            ],
            [
                'room_type_id' => 9,
                'image_url' => 'room_images/default/png9.jpg',
            ],
        ]);
    }
}
