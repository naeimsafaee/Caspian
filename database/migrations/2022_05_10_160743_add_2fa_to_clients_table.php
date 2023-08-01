<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Add2faToClientsTable extends Migration
{

    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->boolean('is_2fa_email')->default(false)->after('is_phone_verify');
            $table->boolean('is_2fa_phone')->default(false)->after('is_2fa_email');
        });
    }


    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
