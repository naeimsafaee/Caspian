<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsFakeToBidsTable extends Migration {

    public function up() {
        Schema::table('bids', function(Blueprint $table) {
            $table->boolean('is_fake')->default(false)->after('fill');
        });

        Schema::table('offers', function(Blueprint $table) {
            $table->boolean('is_fake')->default(false)->after('fill');
        });
    }

    public function down() {
        Schema::table('bids', function(Blueprint $table) {
            //
        });
    }
}
