<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradersTable extends Migration {

    public function up() {
        Schema::create('traders', function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('client_id');
            $table->enum('pay_type', ['darsad', 'free', 'first_pay'])->default('free');
            $table->string('pay_value')->default('0');
            $table->string('username');
            $table->integer('profit_percent')->default(0);
            $table->string('paid_value');
            $table->integer('copied_count')->default(0);
            $table->enum('status', ['accepted', 'requested', ' rejected'])->default('requested');
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    public function down() {
        Schema::dropIfExists('traders');
    }
}
