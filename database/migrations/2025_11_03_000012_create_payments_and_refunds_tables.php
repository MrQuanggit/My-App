<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->string('provider')->nullable(); // e.g., stripe, paypal, cod
            $table->string('method')->nullable(); // e.g., card, cash_on_delivery
            $table->string('transaction_id')->nullable()->unique();
            $table->string('status')->default('pending'); // pending, paid, failed, refunded, canceled
            $table->unsignedInteger('amount_cents');
            $table->string('currency', 3)->default('USD');
            $table->timestamp('paid_at')->nullable();
            $table->timestamp('refunded_at')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->index(['order_id', 'status']);
            // Removed check constraint for compatibility; enforce via unsigned type.
        });

        Schema::create('refunds', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payment_id')->constrained('payments')->cascadeOnDelete();
            $table->foreignId('order_id')->constrained('orders')->cascadeOnDelete();
            $table->unsignedInteger('amount_cents');
            $table->string('status')->default('pending'); // pending, succeeded, failed, canceled
            $table->string('reason')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->index(['order_id', 'payment_id']);
            // Removed check constraint for compatibility; enforce via unsigned type.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('refunds');
        Schema::dropIfExists('payments');
    }
};
