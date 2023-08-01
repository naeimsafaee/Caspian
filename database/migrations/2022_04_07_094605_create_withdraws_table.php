<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithdrawsTable extends Migration {

    public function up() {
        Schema::create('withdraws', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('network_id');
            $table->unsignedBigInteger('coin_id');
            $table->unsignedBigInteger('client_id');
            $table->string('amount');
            $table->string('address');
            $table->enum('status' , ['waiting' , 'sent' , 'confirmed' , 'rejected'])->default('waiting');
            $table->dateTime('pay_at')->nullable();
            $table->timestamps();


            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('network_id')->references('id')->on('networks')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('coin_id')->references('id')->on('coins')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('withdraws');
    }
}
