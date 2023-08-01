<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPhonecodeToClientsTable extends Migration
{

    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
             $table->string('phone_code')->nullable()->after('reset_link');
             $table->string('email_code')->nullable()->after('phone_code');
        });
    }


    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
