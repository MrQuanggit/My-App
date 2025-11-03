<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Optional link back to the originating cart (guest or user cart)
            $table->foreignId('cart_id')
                ->nullable()
                ->after('user_id')
                ->constrained('carts')
                ->nullOnDelete();

            // Guest checkout contact fields (when user_id is NULL)
            $table->string('guest_email')->nullable()->after('number');
            $table->string('guest_first_name')->nullable()->after('guest_email');
            $table->string('guest_last_name')->nullable()->after('guest_first_name');
            $table->string('guest_phone')->nullable()->after('guest_last_name');

            // Helpful index for querying guest orders
            $table->index(['guest_email', 'status']);
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            // Drop the composite index using its columns (Laravel will resolve the name)
            $table->dropIndex(['guest_email', 'status']);

            if (Schema::hasColumn('orders', 'guest_phone')) {
                $table->dropColumn('guest_phone');
            }
            if (Schema::hasColumn('orders', 'guest_last_name')) {
                $table->dropColumn('guest_last_name');
            }
            if (Schema::hasColumn('orders', 'guest_first_name')) {
                $table->dropColumn('guest_first_name');
            }
            if (Schema::hasColumn('orders', 'guest_email')) {
                $table->dropColumn('guest_email');
            }

            // Drop FK then column if present
            if (Schema::hasColumn('orders', 'cart_id')) {
                $table->dropConstrainedForeignId('cart_id');
            }
        });
    }
};
