<?php

use App\Models\WebsiteAccount;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Laravel\Fortify\Fortify;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('website_accounts', function (Blueprint $table) {
            $table->id();

            $table->integer('current_user_id')->nullable()->unique();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('two_factor_secret')->nullable();

            $table->text('two_factor_recovery_codes')->nullable();

            if (Fortify::confirmsTwoFactorAuthentication()) {
                $table->timestamp('two_factor_confirmed_at')->nullable();
            }

            $table->string('referral_code')->nullable()->unique();
            $table->unsignedInteger('website_balance')->default(0);
            $table->string('remember_token')->nullable();

            $table->timestamps();

            $table->foreign('current_user_id')->references('id')->on('users')->nullOnDelete();
        });

        $users = DB::table('users')->select(['id', 'mail', 'password', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at', 'referral_code', 'website_balance'])->get();
        foreach ($users as $user) {
            WebsiteAccount::create([
                'current_user_id' => $user->id,
                'email' => $user->mail,
                'password' => $user->password,
                'two_factor_secret' => $user->two_factor_secret ?? null,
                'two_factor_recovery_codes' => $user->two_factor_recovery_codes ?? null,
                'two_factor_confirmed_at' => $user->two_factor_confirmed_at ?? null,
                'referral_code' => $user->referral_code,
                'website_balance' => $user->website_balance ?? 0,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_accounts');
    }
};
