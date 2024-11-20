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
        Schema::create('booking_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users', 'id')->onDelete('cascade');
            $table->foreignId('room_type_id')->constrained('room_types', 'room_type_id')->onDelete('cascade');
            $table->json('room_numbers')->nullable();
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_address')->nullable();
            $table->string('room_type_name');
            $table->string('price_per_room');
            $table->string('total_pay');
            $table->date('check_in');
            $table->date('check_out');
            $table->enum('status', ['cancelled', 'booked', 'pending'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booking_history');
    }
};
