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
            'roles' => true,
        ]);

        $this->call(TypeRoomSeeder::class);
        $this->call(RoomSeeder::class);
        $this->call(room_images::class);

        $check_in = now()->toDateString();
        $check_out = now()->addDay()->toDateString();

        TypeRoom::all()->each(function ($typeRoom) use ($check_in, $check_out) {
            $typeRoom->updateRoomCounts($check_in, $check_out);
        });
        $this->call(UserSeeder::class);
        $this->call(AboutPageSeeder::class);
        $this->call(ContactPageSeeder::class);
    }
}
