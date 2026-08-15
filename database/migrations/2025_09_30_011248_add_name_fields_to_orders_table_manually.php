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
        Schema::table('orders', function (Blueprint $table) {
            // Check if columns don't exist before adding them
            if (!Schema::hasColumn('orders', 'first_name')) {
                $table->string('first_name')->nullable()->after('customer_name');
            }
            if (!Schema::hasColumn('orders', 'last_name')) {
                $table->string('last_name')->nullable()->after('first_name');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            if (Schema::hasColumn('orders', 'first_name')) {
                $table->dropColumn('first_name');
            }
            if (Schema::hasColumn('orders', 'last_name')) {
                $table->dropColumn('last_name');
            }
        });
    }
};
