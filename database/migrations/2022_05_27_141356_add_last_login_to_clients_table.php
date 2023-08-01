<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLastLoginToClientsTable extends Migration {

    public function up() {
        Schema::table('clients', function(Blueprint $table) {
            $table->timestamp('last_login_at')->after('updated_at');
        });
    }

    public function down() {
        Schema::table('clients', function(Blueprint $table) {
            //
        });
    }
}
