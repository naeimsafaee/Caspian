<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountCardsTable extends Migration {

    public function up() {
        Schema::create('account_cards', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->string('owner_name');
            $table->string('account_number');
            $table->enum('status', ['requested', 'accepted', 'rejected'])->default('requested');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    public function down() {
        Schema::dropIfExists('account_cards');
    }
}
