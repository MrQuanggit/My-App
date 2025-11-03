<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone')->nullable()->unique()->after('email');
            $table->enum('role', ['admin', 'customer'])->default('customer')->after('password');
            $table->boolean('is_active')->default(true)->after('role');
            // Optional 2FA secret or provider reference
            $table->string('two_factor_secret')->nullable()->after('remember_token');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['phone', 'role', 'is_active', 'two_factor_secret']);
        });
    }
};
