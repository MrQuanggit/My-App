<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->restrictOnDelete();
            $table->foreignId('size_id')->nullable()->constrained('sizes')->restrictOnDelete();
            $table->foreignId('color_id')->nullable()->constrained('colors')->restrictOnDelete();
            $table->string('sku')->unique();
            $table->unsignedInteger('price_cents');
            $table->unsignedInteger('stock')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            // Useful generated combo key to ensure uniqueness per option combo
            $table->string('combo_key')->storedAs("concat(product_id, '-', coalesce(size_id, 0), '-', coalesce(color_id, 0))");
            $table->unique('combo_key');

            // Indexes for lookups
            $table->index(['product_id', 'size_id', 'color_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
