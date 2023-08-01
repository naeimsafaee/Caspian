<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIs2faAuthToClientsTable extends Migration
{

    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->boolean('is_2fa_authenticator')->after('is_2fa_phone')->default(false);
            $table->string('authenticator_secret')->after('remember_token')->nullable();
        });
    }


    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
