<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBidsTable extends Migration {

    public function up() {
        Schema::create('bids', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('pair_id');
            $table->string('amount');
            $table->string('price');
            $table->string('fill')->default('0');
            $table->enum('status' , ['active' , 'filled' , 'canceled']);
            $table->timestamps();


            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('pair_id')->references('id')->on('pairs')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    public function down() {
        Schema::dropIfExists('bids');
    }
}
