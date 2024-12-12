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
        Schema::create('check-out_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checkout_id')->constrained('check-out_form', 'checkout_id');
            $table->foreignId('room_id')->constrained('rooms', 'room_id');
            $table->double('cleaning_fee');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check-out_details');
    }
};
