<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmailStepOne extends Mailable {
    use Queueable, SerializesModels;

    private $link;

    public function __construct($link) {
        $this->link = $link;
    }

    public function build() {

        $link = $this->link;

        return $this->subject("تایید سطح یک کاربری")->from(config('mail.from.address'), config('mail.from.name'))
            ->view('mail.verify_email_step_one', compact('link'))
            ->withSwiftMessage(function($message) {
                $message->getHeaders()
                    ->addTextHeader('List-Unsubscribe', config('mail.from.address'));
            });
    }
}
