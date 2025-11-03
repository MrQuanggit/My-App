<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            // Generated column to mark active status
            $table->boolean('is_active')->storedAs("status = 'active'")->after('status');
            // Enforce at most one active cart per user (NULL user_id allowed for guests)
            $table->unique(['user_id', 'is_active'], 'uniq_user_active_cart');
        });
    }

    public function down(): void
    {
        Schema::table('carts', function (Blueprint $table) {
            $table->dropUnique('uniq_user_active_cart');
            $table->dropColumn('is_active');
        });
    }
};
