<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChangesTable extends Migration {

    public function up() {
        Schema::create('changes', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pair_id')->index();
            $table->double('price');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('changes');
    }
}
