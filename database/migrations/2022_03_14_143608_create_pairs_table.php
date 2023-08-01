<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairsTable extends Migration {

    public function up() {
        Schema::create('pairs', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coin_id');
            $table->unsignedBigInteger('vs_coin_id');
            $table->timestamps();

            $table->foreign('coin_id')->references('id')->on('coins')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('vs_coin_id')->references('id')->on('coins')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('pairs');
    }
}
