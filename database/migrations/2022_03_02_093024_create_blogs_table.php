<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{

    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text('image')->nullable();
            $table->text('title');
            $table->text('content');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
