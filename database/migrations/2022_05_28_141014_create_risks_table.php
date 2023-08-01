<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRisksTable extends Migration {

    public function up() {
        Schema::create('risks', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trader_id');
            $table->integer('risk');
            $table->timestamps();

            $table->foreign('trader_id')->references('id')->on('traders')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    public function down() {
        Schema::dropIfExists('risks');
    }
}
