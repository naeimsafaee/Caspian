<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangeBaseOnCurrenciesTable extends Migration {

    public function up() {
        Schema::create('change_base_on_currencies', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pair_id');
            $table->double('price');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('change_base_on_currencies');
    }
}
