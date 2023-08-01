<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsHomeToPairsTable extends Migration {

    public function up() {
        Schema::table('pairs', function(Blueprint $table) {
            $table->boolean('is_home')->default(false)->after('vs_coin_id');
        });
    }

    public function down() {
        Schema::table('pairs', function(Blueprint $table) {
            //
        });
    }
}
