<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoriteCoinsTable extends Migration
{

    public function up()
    {
        Schema::create('favorite_coins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coin_id');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('favorite_coins');
    }
}
