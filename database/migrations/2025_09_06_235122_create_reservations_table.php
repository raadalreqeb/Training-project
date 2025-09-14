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
        Schema::create('reservations', function (Blueprint $table) {
           $table->id('Reservation_ID');
                 $table->foreignId('user_id')->constrained('users', 'user_id')->cascadeOnDelete();
                  $table->foreignId('room_id')->constrained('rooms', 'room_id')->cascadeOnDelete();
                $table->date ('start_date');
                  $table->date('end_date');
                 $table->string('status')->default('pending');
                 $table->decimal('total_price', 8, 2)->default(0);
                     $table->string('payment_status')->default('unpaid');
            $table->timestamps();

           });

        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
