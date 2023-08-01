<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration {

    public function up() {
        Schema::create('deposits', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coin_id');
            $table->unsignedBigInteger('network_id');
            $table->unsignedBigInteger('client_id');
            $table->string('amount');
            $table->timestamps();

            $table->foreign('network_id')->references('id')->on('networks')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('coin_id')->references('id')->on('coins')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('deposits');
    }
}
