<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{

    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->string('phone')->nullable();
            $table->text('password');
            $table->text('reset_link')->nullable();
            $table->boolean('is_email_verify')->default(false);
            $table->boolean('is_phone_verify')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
