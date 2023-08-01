<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddVolumeToCoinsTable extends Migration
{

    public function up()
    {
        Schema::table('coins', function (Blueprint $table) {
            $table->bigInteger('volume')->default(0)->after('price');
            $table->bigInteger('internal_volume')->default(0)->after('volume');
        });
    }

    public function down()
    {
        Schema::table('coins', function (Blueprint $table) {
            //
        });
    }
}
