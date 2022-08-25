<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        $storedKeys = [];

        if (config('habbo.migrations.rename_tables') && Schema::hasTable('claimed_referral_logs')) {

            $keys = DB::select(DB::raw('SHOW KEYS from claimed_referral_logs'));

            foreach ($keys as $key) {
                $storedKeys[] = $key->Key_name;
            }

            if (in_array('claimed_referral_logs_user_id_index', $storedKeys)) {
                Schema::table('claimed_referral_logs', function (Blueprint $table) {
                    $table->dropConstrainedForeignId('user_id');
                });
            }

            Schema::rename('claimed_referral_logs', sprintf('claimed_referral_logs_%s', time()));
        }

        Schema::create('claimed_referral_logs', function (Blueprint $table) use ($storedKeys) {
            $table->id();
            $table->integer('user_id')->index();
            $table->string('ip_address');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('claimed_referral_logs');
    }
};