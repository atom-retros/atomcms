<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('website_paypal_transactions', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->string('payer_id')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('status');
            $table->float('amount')->nullable();
            $table->string('currency')->default('USD');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }
};
