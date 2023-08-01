<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNetworksTable extends Migration {

    public function up() {
        Schema::create('networks', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('symbol');
            $table->string('persian_name');
            $table->text('description');
            $table->boolean('has_memo')->default(false);
            $table->string('path');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('networks');
    }
}
