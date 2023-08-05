<?php

use App\Models\WebsiteAccount;
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
            $table->unsignedBigInteger('account_id')->after('id');

        });

        Schema::table('users', function (Blueprint $table) {
            foreach (WebsiteAccount::get() as $account) {
                \App\Models\User::where('id', $account->current_user_id)->update([
                    'account_id' => $account->id,
                ]);
            }

            $table->foreign('account_id')->references('id')->on('website_accounts')->cascadeOnDelete();

            $table->dropColumn(['password', 'two_factor_secret', 'two_factor_recovery_codes', 'two_factor_confirmed_at', 'referral_code', 'website_balance']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
