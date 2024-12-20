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
        Schema::table('authdashboard', function (Blueprint $table) {
            $table->dropUnique(['password']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('authdashboard', function (Blueprint $table) {
            $table->string('password')->unique()->change();
        });
    }
};
