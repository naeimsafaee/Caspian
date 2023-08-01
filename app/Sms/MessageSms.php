<?php

namespace App\Sms;

class MessageSms extends Smsable {

    private string $message;
    public string $method;

    public array $data;


    public function __construct($message) {
        $this->message = $message;
    }

    public function send() {
        $this->method = "/sms/send.json";

        $this->data = [
            'message' => $this->message,
        ];
    }



}