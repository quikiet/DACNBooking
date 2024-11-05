<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id('room_id');
            $table->string('name');
            $table->string('room_number');
            $table->enum('status',['Trống','Đang sử dụng','Bảo trì'])->default('Trống');
            $table->foreignId('room_type_id') // Khóa ngoại
                  ->constrained('room_types','room_type_id') // Liên kết với bảng type_rooms
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};