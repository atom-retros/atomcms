<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('website_articles', function (Blueprint $table) {
            $storedKeys = [];
            $keys = DB::select(DB::raw('SHOW KEYS from website_articles'));

            foreach ($keys as $key) {
                $storedKeys[] = $key->Key_name;
            }

            $droppedColumn = false;
            if (in_array('website_articles_user_id_foreign', $storedKeys)) {
                Schema::table('website_articles', function (Blueprint $table) {
                    $table->dropConstrainedForeignId('user_id');
                });

                $droppedColumn = true;
            }

            if ($droppedColumn || !Schema::hasColumn('website_articles', 'user_id')) {
                $table->addColumn('integer', 'user_id')->after('full_story');
                $table->foreign('user_id')->references('id')->on('users')->constrained()->cascadeOnDelete();
            } else {
                $table->integer('user_id')->change();
            }
        });
    }

    public function down()
    {
        Schema::table('website_articles', function (Blueprint $table) {
        });
    }
};