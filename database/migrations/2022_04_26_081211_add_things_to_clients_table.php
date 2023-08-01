<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThingsToClientsTable extends Migration
{

    public function up()
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->tinyInteger('level')->default(0)->after('id');
            $table->string('last_name')->after('name')->nullable();
            $table->string('melli_code')->after('is_phone_verify')->nullable();
        });
    }


    public function down()
    {
        Schema::table('clients', function (Blueprint $table) {
            //
        });
    }
}
