<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('payment_id');
            
            $table->unsignedBigInteger('invoice_id');
            $table->foreign('invoice_id')
                  ->references('invoice_id')
                  ->on('invoices')
                  ->cascadeOnDelete();
            
            $table->enum('payment_method', ['cash', 'visa', 'online']);
            $table->decimal('amount', 10, 2);
            $table->string('transaction_id')->nullable();
            $table->enum('payment_status', ['pending', 'completed', 'failed', 'refunded'])
                  ->default('pending');
            
            $table->timestamp('paid_at')->nullable();
            $table->text('notes')->nullable();
            
            $table->timestamps();
            
            $table->index('invoice_id');
            $table->index('payment_status');
            $table->index('transaction_id');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
