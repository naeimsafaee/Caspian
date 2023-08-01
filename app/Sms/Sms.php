<?php

namespace App\Sms;

use Illuminate\Support\Facades\Http;

class Sms {

    private static Sms $sms;

    private array $to;

    public function __construct() {
        static::$sms = $this;
    }

    public static function get_instance() {
        if(isset(static::$sms))
            return static::$sms;
        return new Sms();
    }

    public static function to(array $users) {
        $sms = self::get_instance();

        $sms->to = $users;

        return $sms;
    }

    public function send(Smsable $sending_sms) {

        $smsable = $sending_sms->build();

        $data = $smsable->data;

        $data['receptor'] = implode(',' ,$this->to);

        $http = Http::asForm()->post(config('services.kavenegar.base_url') . config('services.kavenegar.token') . $smsable->method,
            $data);

//        die(($http->body()));

    }

}