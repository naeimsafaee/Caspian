<?php

namespace App\Observers;

use App\Models\Client;
use App\Models\ClientNotification;

class ClientObserver {

    /**
     * Handle the Client "created" event.
     *
     * @param \App\Models\Client $client
     * @return void
     */
    public function created(Client $client) {
        ClientNotification::query()->create([
            'type' => 'register',
            'client_id' => $client->id,
            'description' => "شما در این تاریخ به کاسپین پیوندید.",
            'title' => 'ثبت نام'
        ]);
    }

    /**
     * Handle the Client "updated" event.
     *
     * @param \App\Models\Client $client
     * @return void
     */
    public function updated(Client $client) {
        if ($client->wasChanged('last_login_at')) {
            ClientNotification::query()->create([
                'type' => 'login',
                'client_id' => $client->id,
                'description' => "شما در این تاریخ وارد کاسپین شدید.",
                'title' => 'ورود به سیستم'
            ]);
        }

        if ($client->wasChanged('password')) {
            ClientNotification::query()->create([
                'type' => 'change-password',
                'client_id' => $client->id,
                'description' => "شما رمز عبور خود را با موفقیت تغییر دادید.",
                'title' => 'تغییر رمز عبور'
            ]);
        }

        if ($client->wasChanged('reset_link')) {
            if ($client->reset_link)
                ClientNotification::query()->create([
                    'type' => 'forget-password_link',
                    'client_id' => $client->id,
                    'description' => "شما در این تاریخ درخواست فراموشی رمز عبور دادید.",
                    'title' => 'درخواست فراموشی رمز عبور'
                ]);
        }

        if ($client->wasChanged('is_2fa_phone')) {
            if ($client->is_2fa_phone == true) {
                ClientNotification::query()->create([
                    'type' => 'enable-2step-sms',
                    'client_id' => $client->id,
                    'description' => "شما رمز عبور ۲ مرحله ای خود با sms را فعال کردید.",
                    'title' => 'فعال سازی رمز عبور ۲ مرحله ای'
                ]);
            } else {
                ClientNotification::query()->create([
                    'type' => 'disable-2step-sms',
                    'client_id' => $client->id,
                    'description' => "شما رمز عبور ۲ مرحله ای خود با sms را غیر فعال کردید.",
                    'title' => 'غیر فعال سازی رمز عبور ۲ مرحله ای'
                ]);
            }
        }

        if ($client->wasChanged('is_2fa_email')) {
            if ($client->is_2fa_email == true) {
                ClientNotification::query()->create([
                    'type' => 'disable-2step-email',
                    'client_id' => $client->id,
                    'description' => "شما رمز عبور ۲ مرحله ای خود با email را فعال کردید.",
                    'title' => 'فعال سازی رمز عبور ۲ مرحله ای'
                ]);
            } else {
                ClientNotification::query()->create([
                    'type' => 'disable-2step-email',
                    'client_id' => $client->id,
                    'description' => "شما رمز عبور ۲ مرحله ای خود با email را غیر فعال کردید.",
                    'title' => 'غیر فعال سازی رمز عبور ۲ مرحله ای'
                ]);
            }

        }

    }

    /**
     * Handle the Client "deleted" event.
     *
     * @param \App\Models\Client $client
     * @return void
     */
    public function deleted(Client $client) {
        //
    }

    /**
     * Handle the Client "restored" event.
     *
     * @param \App\Models\Client $client
     * @return void
     */
    public function restored(Client $client) {
        //
    }

    /**
     * Handle the Client "force deleted" event.
     *
     * @param \App\Models\Client $client
     * @return void
     */
    public function forceDeleted(Client $client) {
        //
    }
}
