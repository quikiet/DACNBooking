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
        Schema::create('check-in_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('checkin_id')->constrained('check-in_form', 'checkin_id');
            $table->foreignId('room_id')->constrained('rooms', 'room_id');
            $table->double('price_per_night');
            $table->integer('number_of_night');
            $table->double('sub_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check-in_details');
    }
};
