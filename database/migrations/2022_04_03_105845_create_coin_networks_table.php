<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinNetworksTable extends Migration {

    public function up() {
        Schema::create('coin_networks', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coin_id');
            $table->unsignedBigInteger('network_id');
            $table->timestamps();

            $table->foreign('coin_id')->references('id')->on('coins')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('network_id')->references('id')->on('networks')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    public function down() {
        Schema::dropIfExists('coin_networks');
    }
}
