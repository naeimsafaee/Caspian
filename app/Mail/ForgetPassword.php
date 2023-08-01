<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetPassword extends Mailable {

    use Queueable, SerializesModels;

    private $link;

    public function __construct($link) {
        $this->link = $link;
    }

    public function build() {

        $link = $this->link;

        return $this->subject("فراموشی رمز عبور کاسپین")
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->view('mail.forget_password', compact('link'))
            ->withSwiftMessage(function($message) {
                $message->getHeaders()
                    ->addTextHeader('List-Unsubscribe', config('app.url') . "/unsubscribe");
            });

    }
}

