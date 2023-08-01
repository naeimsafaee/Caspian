<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginTwoStep extends Mailable {
    use Queueable, SerializesModels;

    private $link;

    public function __construct($link) {
        $this->link = $link;
    }

    public function build() {

        $link = $this->link;

        return $this->subject("ورود دو مرحله ای به کاسپین")->from(config('mail.from.address'), config('mail.from.name'))
            ->view('mail.login_two_step', compact('link'))
            ->withSwiftMessage(function($message) {
                $message->getHeaders()
                    ->addTextHeader('List-Unsubscribe', config('mail.from.address'));
            });
    }
}
