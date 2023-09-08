<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        dropForeignKeyIfExists('user_referrals', 'user_id');

        if (config('habbo.migrations.rename_tables') && Schema::hasTable('user_referrals')) {
            Schema::rename('user_referrals', sprintf('user_referrals_%s', time()));
        }

        Schema::create('user_referrals', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->unsignedBigInteger('referrals_total');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_referrals');
    }
};
