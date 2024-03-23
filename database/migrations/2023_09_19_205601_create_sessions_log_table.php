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
        Schema::create('sessions_logs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users');
            $table->ipAddress('IP');
            $table->string('referrers')->nullable();
            $table->string('country')->nullable();
            $table->string('devices')->nullable();
            $table->string('OS')->nullable();
            $table->string('browsers')->nullable();
            $table->text('UA');
            $table->dateTime('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sessions_log');
    }
};
