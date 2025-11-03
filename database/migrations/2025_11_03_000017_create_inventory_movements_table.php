<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inventory_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->restrictOnDelete();
            $table->foreignId('order_item_id')->nullable()->constrained('order_items')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // admin/user who performed
            $table->string('type'); // in, out, adjust
            $table->integer('quantity_delta'); // +in / -out (can be negative)
            $table->string('reason')->nullable();
            $table->json('metadata')->nullable();
            $table->timestamps();
            $table->index(['product_id']);
            // Removed check constraint for compatibility; enforce non-zero in application logic.
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inventory_movements');
    }
};
