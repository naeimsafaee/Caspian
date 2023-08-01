<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdvancesTable extends Migration
{

    public function up()
    {
        Schema::create('advances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->tinyInteger('status')->default(0);
            $table->boolean('commitment')->default(false);
            $table->text('video')->nullable();
            $table->string('home_phone')->nullable();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('advances');
    }
}
