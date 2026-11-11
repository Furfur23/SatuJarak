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
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'role')) {
                $table->string('role', 50)->default('User')->after('is_admin');
            }
            if (! Schema::hasColumn('users', 'status')) {
                $table->string('status', 50)->default('Aktif')->after('role');
            }
            if (! Schema::hasColumn('users', 'no_hp')) {
                $table->string('no_hp', 50)->nullable()->after('status');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'status', 'no_hp']);
        });
    }
};
