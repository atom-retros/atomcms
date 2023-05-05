<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        dropForeignKeyIfExists('claimed_referral_logs', 'user_id');

        if (config('habbo.migrations.rename_tables') && Schema::hasTable('claimed_referral_logs')) {
            Schema::rename('claimed_referral_logs', sprintf('claimed_referral_logs_%s', time()));
        }

        Schema::create('claimed_referral_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('ip_address');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('claimed_referral_logs');
    }
};
