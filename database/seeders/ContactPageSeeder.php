<?php

namespace Database\Seeders;

use App\Models\ContactPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ContactPage::create([
            'address' => '67/8/4 Nguyễn Quý Yêm, An Lạc, Bình Tân',
            'google_map' => 'https://maps.google.com',
            'pn1' => '0123456789',
            'pn2' => '0987654321',
            'email' => 'example@gmail.com',
            'facebook' => 'https://facebook.com',
            'instagram' => 'https://instagram.com',
        ]);

    }
}
