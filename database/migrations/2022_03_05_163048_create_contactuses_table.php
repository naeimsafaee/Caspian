<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactusesTable extends Migration
{

    public function up()
    {
        Schema::create('contactuses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('email');
            $table->text('content');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('contactuses');
    }
}
