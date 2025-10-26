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
        Schema::create('rent_a_cars', function (Blueprint $table) {
            $table->id();
            $table->foreignId('car_id')->constrained('cars')->onDelete('cascade');
            $table->foreignId('driver_id')->nullable()->constrained('drivers');
            $table->foreignId('user_id')->constrained('users');
            $table->string('pick_up_location');
            $table->string('drop_off_location');
            $table->string('pick_up_date');
            $table->string('drop_off_date');
            $table->string('pick_up_time');
            $table->string('payment');
            $table->enum('payment_status',[0,1]);
            $table->enum('status',[0,1]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rent_a_cars');
    }
};
