<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddItemsToCardsTable extends Migration {

    public function up() {
        Schema::table('cards', function(Blueprint $table) {
            $table->string('expiry_date')->nullable()->after('card_number');
            $table->string('cvv2')->nullable()->after('card_number');
        });
    }

    public function down() {
        Schema::table('cards', function(Blueprint $table) {
            //
        });
    }
}
