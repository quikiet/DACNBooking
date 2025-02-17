<?php

namespace Database\Seeders;

use App\Models\AboutPage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutPageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutPage::create([
            'content' => 'Chào mừng bạn đã đến với khách sạn của tôi. Tôi tên Trần Quí Kiệt, mã sinh viên DH52101039, học ngành Công nghệ Thông tin tại trường Đại học Công Nghệ Sài Gòn (STU). Đây là nội dung giới thiệu cá nhân của tôi.
',
        ]);
    }
}
