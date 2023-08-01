<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairBaseOnCurrenciesTable extends Migration {

    public function up() {
        Schema::create('pair_base_on_currencies', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coin_id');
            $table->unsignedBigInteger('vs_currency_id');
            $table->boolean('is_home')->default(false);
            $table->timestamps();

            $table->foreign('coin_id')->references('id')->on('coins')
                ->onDelete('cascade')->onUpdate('cascade');

            $table->foreign('vs_currency_id')->references('id')->on('currencies')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('pair_base_on_currencies');
    }
}
