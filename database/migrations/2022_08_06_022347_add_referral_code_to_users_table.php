<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration {
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'referral_code')) {
                Schema::dropColumns('users', 'referral_code');
            }

            $table->string('referral_code')->nullable()->unique()->after('home_room');
        });

        foreach (User::all() as $user) {
            $user->update(['referral_code' => sprintf('%s%s', $user->id, Str::random(5))]);
        }
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('referral_code');
            });
        });
    }
};