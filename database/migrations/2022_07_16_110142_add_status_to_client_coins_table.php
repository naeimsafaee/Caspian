<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToClientCoinsTable extends Migration {

    public function up() {
        Schema::table('client_coins', function(Blueprint $table) {
            $table->enum('status', ['free', 'locked', 'removed'])->default('free')->after('amount');
        });
    }

    public function down() {
        Schema::table('client_coins', function(Blueprint $table) {
            //
        });
    }
}
