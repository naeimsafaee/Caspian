<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemsToNetworksTable extends Migration {

    public function up() {

        Schema::table('networks', function(Blueprint $table) {
            $table->string('default_network_fee')->default(0)->after('path');
            $table->unsignedBigInteger('main_network_coin')->default(0)->after('default_network_fee');
        });

        Schema::table('coin_networks', function(Blueprint $table) {
            $table->string('network_fee')->nullable()->after('network_id');
            $table->text('contract_address')->after('network_fee');
        });

        Schema::table('withdraws', function(Blueprint $table) {
            $table->string('fee')->after('amount');
        });
    }

    public function down() {
        Schema::table('networks', function(Blueprint $table) {
            //
        });
    }
}
