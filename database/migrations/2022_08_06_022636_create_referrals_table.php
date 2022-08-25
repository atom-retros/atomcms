<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        $storedKeys = [];

        if (config('habbo.migrations.rename_tables') && Schema::hasTable('referrals')) {

            $keys = DB::select(DB::raw('SHOW KEYS from referrals'));

            foreach ($keys as $key) {
                $storedKeys[] = $key->Key_name;
            }

            if (in_array('referrals_user_id_index', $storedKeys)) {
                Schema::table('referrals', function (Blueprint $table) {
                    $table->dropConstrainedForeignId('user_id');
                });
            }

            Schema::rename('referrals', sprintf('referrals_%s', time()));
        }

        Schema::create('referrals', function (Blueprint $table) use ($storedKeys) {
            $table->id();
            $table->integer('user_id')->index();
            $table->unsignedBigInteger('referred_user_id');
            $table->string('referred_user_ip');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
        });
    }

    public function down()
    {
        Schema::dropIfExists('referrals');
    }
};