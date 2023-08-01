<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFollowTradersTable extends Migration {

    public function up() {
        Schema::create('follow_traders', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trader_id');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('follow_traders');
    }
}
