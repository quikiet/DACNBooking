<?php

namespace Database\Seeders;

use App\Models\TypeRoom;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TypeRoom::create([
            'name' => 'Standard Room',
            'price' => 500000,
            'adult' => 2,
            'children' => 1,
            'description' => 'Phòng tiêu chuẩn với đầy đủ tiện nghi.'
        ]);

        TypeRoom::create([
            'name' => 'Deluxe Room',
            'price' => 1000000,
            'adult' => 2,
            'children' => 2,
            'description' => 'Phòng cao cấp với không gian rộng rãi.'
        ]);

        TypeRoom::create([
            'name' => 'Suite Room',
            'price' => 2000000,
            'adult' => 4,
            'children' => 2,
            'description' => 'Phòng suite với nội thất sang trọng và tầm nhìn đẹp.'
        ]);
    }
}
