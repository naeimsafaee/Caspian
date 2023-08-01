<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwapHistoriesTable extends Migration {

    public function up() {
        Schema::create('swap_histories', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('coin');
            $table->string('vs_coin');
            $table->string('coin_amount');
            $table->string('vs_coin_amount');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('swap_histories');
    }
}
