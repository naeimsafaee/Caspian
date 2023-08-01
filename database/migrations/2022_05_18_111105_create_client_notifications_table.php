<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientNotificationsTable extends Migration {

    public function up() {
        Schema::create('client_notifications', function(Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->boolean('is_read')->default(false);
            $table->unsignedBigInteger('client_id');
            $table->enum('type', [
                'deposit-coin',
                'withdraw-coin',
                'login',
                'register',
                'forget-password',
                'forget-password_request',
                'change-password',
                'deposit-cash',
                'withdraw-cash',
                'enable-2step-sms',
                'enable-2step-email',
                'enable-2step-authenticator',
                'disable-2step-sms',
                'disable-2step-email',
                'disable-2step-authenticator',
            ]);
            $table->timestamps();

            $table->foreign('client_id')->references('id')->on('clients')
                ->onDelete('cascade')->onUpdate('cascade');

        });
    }

    public function down() {
        Schema::dropIfExists('client_notifications');
    }
}
