<?php

namespace App\Sms;

abstract class Smsable {

    public string $method;
    public array $data;

    public function __construct() {

    }

    protected function verification_code_sms($code): VerificationCodeSms {
        return new VerificationCodeSms($code);
    }

    protected function message_sms($message): MessageSms {
        return new MessageSms($message);
    }

    public function build(): Smsable {
        return $this;
    }

}