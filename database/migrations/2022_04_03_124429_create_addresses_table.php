<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration {

    public function up() {
        Schema::create('addresses', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('network_id');
            $table->unsignedBigInteger('coin_id');
            $table->string('address');
            $table->string('balance')->default(0);
            $table->text('contract_address')->nullable();
            $table->timestamps();


            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('coin_id')->references('id')->on('coins')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('network_id')->references('id')->on('networks')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('addresses');
    }
}
