<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIntermediatesTable extends Migration
{

    public function up()
    {
        Schema::create('intermediates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->tinyInteger('status')->default(0);
            $table->text('front_image');
            $table->text('back_image');
            $table->text('address');
            $table->string('postal_code');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('intermediates');
    }
}
