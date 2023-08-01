<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoinsTable extends Migration {

    public function up() {
        Schema::create('coins', function(Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('persian_name')->nullable();
            $table->string('symbol');
            $table->text('icon')->nullable();
            $table->string('price')->default('0');
            $table->string('change')->nullable();
            $table->string('max_withdraw_daily')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('coins');
    }
}
