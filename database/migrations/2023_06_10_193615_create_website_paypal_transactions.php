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
        Schema::create('website_paypal_transactions', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->string('transaction_id');
            $table->string('status')->nullable();
            $table->float('amount');
            $table->string('currency')->default('USD');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_paypal_transactions');
    }
};
