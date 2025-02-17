<?php

namespace Database\Seeders;

use App\Models\TypeRoom;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('room_types')->insert([
            [
                'name' => 'Phòng Đơn',
                'price' => 500000,
                'adult' => 1,
                'children' => 1,
                'description' => 'Phòng đơn thoải mái dành cho một người, trang bị đầy đủ tiện nghi.'
            ],
            [
                'name' => 'Phòng Đôi',
                'price' => 800000,
                'adult' => 2,
                'children' => 1,
                'description' => 'Phòng đôi rộng rãi, lý tưởng cho cặp đôi hoặc gia đình nhỏ.'
            ],
            [
                'name' => 'Phòng Gia Đình',
                'price' => 1200000,
                'adult' => 2,
                'children' => 2,
                'description' => 'Phòng gia đình với không gian thoải mái cho 4 người, thích hợp cho gia đình lớn.'
            ],
            [
                'name' => 'Phòng Sang Trọng giường đơn',
                'price' => 2000000,
                'adult' => 2,
                'children' => 2,
                'description' => 'Phòng sang trọng với thiết kế hiện đại, đầy đủ tiện nghi cao cấp.'
            ],
            [
                'name' => 'Phòng VIP',
                'price' => 3000000,
                'adult' => 2,
                'children' => 3,
                'description' => 'Phòng VIP với dịch vụ cao cấp, không gian riêng tư và tiện nghi tuyệt vời.'
            ],
            [
                'name' => 'Phòng sang trọng giường đôi',
                'price' => 2500000,
                'adult' => 2,
                'children' => 2,
                'description' => 'Phòng sang trọng với nhiều thiết kế hiện đại, đầy đủ tiện nghi cao cấp, giường đôi to cho vợ chồng'
            ],
            [
                'name' => 'Phòng Hạng Sang',
                'price' => 3500000,
                'adult' => 2,
                'children' => 2,
                'description' => 'Phòng hạng sang với nội thất cao cấp và dịch vụ 24/7.'
            ],
            [
                'name' => 'Villa 3 giường',
                'price' => 7200000,
                'adult' => 4,
                'children' => 4,
                'description' => 'Phòng tập thể với giường tầng, phù hợp cho nhóm bạn hoặc khách du lịch.'
            ],
            [
                'name' => 'Villa 4 giường',
                'price' => 8000000,
                'adult' => 6,
                'children' => 4,
                'description' => 'Phòng Deluxe với không gian rộng rãi và tiện nghi hiện đại.'
            ],
        ]);
    }
}
