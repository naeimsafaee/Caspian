<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsTraderToClientsTable extends Migration {

    public function up() {
        Schema::table('clients', function(Blueprint $table) {
            $table->boolean('is_trader')->default(false)->after('is_phone_verify');
        });
    }

    public function down() {
        Schema::table('clients', function(Blueprint $table) {
            //
        });
    }
}
