<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        $storedKeys = [];

        if (config('habbo.migrations.rename_tables') && Schema::hasTable('user_referrals')) {

            $keys = DB::select(DB::raw('SHOW KEYS from user_referrals'));
            foreach ($keys as $key) {
                $storedKeys[] = $key->Key_name;
            }

            if (in_array('user_referrals_user_id_foreign', $storedKeys)) {
                Schema::table('user_referrals', function (Blueprint $table) {
                    $table->dropConstrainedForeignId('user_id');
                });
            }

            Schema::rename('user_referrals', sprintf('user_referrals_%s', time()));
        }

        Schema::create('user_referrals', function (Blueprint $table) use ($storedKeys) {
            $table->id();
            $table->integer('user_id');
            $table->unsignedBigInteger('referrals_total');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_referrals');
    }
};