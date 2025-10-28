<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->id('invoice_id');
            
            $table->unsignedBigInteger('reservation_id');
            $table->foreign('reservation_id')
                  ->references('Reservation_ID')
                  ->on('reservations')
                  ->cascadeOnDelete();
            
            $table->string('invoice_number')->unique();
            $table->decimal('total_amount', 10, 2);
            $table->decimal('tax_amount', 10, 2)->default(0);
            $table->decimal('discount', 10, 2)->default(0);
            $table->decimal('final_amount', 10, 2);
            
            $table->enum('status', ['pending', 'paid', 'cancelled', 'refunded'])
                  ->default('pending');
            
            $table->date('issued_date');
            $table->date('due_date')->nullable();
            
            $table->timestamps();
            
            $table->index('reservation_id');
            $table->index('invoice_number');
            $table->index('status');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
