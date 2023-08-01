<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddExitIdToBidsTable extends Migration {

    public function up() {

        Schema::table('bids', function(Blueprint $table) {
            $table->unsignedBigInteger('profit_price')->after('status')->nullable();
            $table->unsignedBigInteger('loss_price')->after('status')->nullable();
        });

        Schema::table('offers', function(Blueprint $table) {
            $table->unsignedBigInteger('profit_price')->after('status')->nullable();
            $table->unsignedBigInteger('loss_price')->after('status')->nullable();        });
    }

    public function down() {
        Schema::table('bids', function(Blueprint $table) {
            //
        });
    }
}
