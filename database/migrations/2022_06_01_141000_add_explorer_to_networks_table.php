<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExplorerToNetworksTable extends Migration {

    public function up() {
        Schema::table('networks', function(Blueprint $table) {
            $table->string('explorer')->after('path')->nullable();
            $table->string('explorer_token')->after('explorer')->nullable();
        });
    }

    public function down() {
        Schema::table('networks', function(Blueprint $table) {
            //
        });
    }
}
