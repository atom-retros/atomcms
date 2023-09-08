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
        if (config('habbo.migrations.rename_tables') && Schema::hasTable('users_session_logs')) {
            Schema::rename('users_session_logs', sprintf('users_session_logs_%s', time()));
        }

        Schema::create('users_session_logs', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('user_id');
            $table->string('ip', 100)->default('0');
            $table->text('browser')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users_session_logs');
    }
};
