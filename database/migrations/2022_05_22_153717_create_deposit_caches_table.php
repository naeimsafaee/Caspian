<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositCachesTable extends Migration {

    public function up() {
        Schema::create('deposit_caches', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('card_id');
            $table->unsignedBigInteger('client_id');
            $table->string('amount');
            $table->string('transaction_id')->nullable();
            $table->boolean('is_paid')->default(false);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('card_id')->references('id')->on('cards')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    public function down() {
        Schema::dropIfExists('deposit_caches');
    }
}
