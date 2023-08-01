<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmailAfterRegister extends Mailable {
    use Queueable, SerializesModels;

    private $link;

    public function __construct($link) {
        $this->link = $link;
    }

    public function build() {

        $link = $this->link;

        return $this->subject("تایید ایمیل")
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->view('mail.verify_email-after_register', compact('link'))->withSwiftMessage(function($message) {
                $message->getHeaders()
                    ->addTextHeader('List-Unsubscribe', config('mail.from.address'));
            });
    }
}
