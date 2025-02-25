<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('booking_id')->constrained('bookings', 'booking_id')->onDelete('cascade');
            $table->foreignId('room_type_id')->constrained('room_types', 'room_type_id')->onDelete('cascade');
            $table->integer('quantity')->default(1);
            $table->foreignId('room_id')->nullable()->constrained('rooms', 'room_id')->onDelete('set null'); // Thêm cột room_id
            $table->double('price_per_room');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_details');
    }
};
