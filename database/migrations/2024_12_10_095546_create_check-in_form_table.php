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
        Schema::create('check-in_form', function (Blueprint $table) {
            $table->id('checkin_id');
            $table->foreignId('user_id')->constrained('users', 'id');
            $table->double('total_pay');
            $table->enum('status', ['pending', 'paid', 'booked', 'completed'])->default('pending');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check-in_form');
    }
};
