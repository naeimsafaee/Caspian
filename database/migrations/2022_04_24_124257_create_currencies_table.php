<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCurrenciesTable extends Migration {

    public function up() {
        Schema::create('currencies', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('icon')->nullable();
            $table->string('persian_name');
            $table->string('symbol');
            $table->string('price')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->timestamps();


             $table->foreign('country_id')->references('id')->on('countries')
                 ->nullOnDelete()->onUpdate('cascade');
        });
    }

    public function down() {
        Schema::dropIfExists('currencies');
    }
}


