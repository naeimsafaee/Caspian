<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawCachesTable extends Migration {

    public function up() {
        Schema::create('withdraw_caches', function(Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->unsignedBigInteger('card_id');
            $table->unsignedBigInteger('client_id');
            $table->boolean('is_paid')->default(false);
            $table->dateTime('pay_at')->nullable();
            $table->text('transaction_id');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    public function down() {
        Schema::dropIfExists('withdraw_caches');
    }
}
