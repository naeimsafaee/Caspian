<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraderRisksTable extends Migration
{

    public function up()
    {
        Schema::create('trader_risks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trader_id');
            $table->integer('risk');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('trader_risks');
    }
}
