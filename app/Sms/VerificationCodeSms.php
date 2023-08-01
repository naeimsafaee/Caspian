<?php

namespace App\Sms;

class VerificationCodeSms extends Smsable {

    private string $code;
    private string $template;
    public string $method;

    public array $data;

    public function __construct($code) {
        $this->code = $code;
    }

    public function with_template($template){
        $this->template = $template;
        return $this;
    }

    public function lookup() {

        $this->method =  "/verify/lookup.json";
        $this->data = [
            'token' => $this->code,
            'template' => $this->template,
        ];

        return $this;
    }

}