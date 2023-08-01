<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration {

    public function up() {
        Schema::create('cards', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('owner_name');
            $table->string('card_number');
            $table->unsignedBigInteger('bank_id');
            $table->enum('status' , ['requested' , 'accepted' , 'rejected'])->default('requested');
            $table->timestamps();

            $table->foreign('bank_id')->references('id')->on('banks')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    public function down() {
        Schema::dropIfExists('cards');
    }
}
