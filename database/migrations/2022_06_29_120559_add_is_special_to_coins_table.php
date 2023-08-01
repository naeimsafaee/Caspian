<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsSpecialToCoinsTable extends Migration {

    public function up() {
        Schema::table('coins', function(Blueprint $table) {
            $table->boolean('is_special')->default(false)->after('max_withdraw_daily');
        });
    }

    public function down() {
        Schema::table('coins', function(Blueprint $table) {
            //
        });
    }
}
