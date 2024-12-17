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
        Schema::create('check-out_form', function (Blueprint $table) {
            $table->id('checkout_id');
            $table->foreignId('checkin_id')->constrained('check-in_form', 'checkin_id')->onDelete('cascade');
            $table->date('checkout_date');
            $table->double('total_pay');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('check-out_form');
    }
};
