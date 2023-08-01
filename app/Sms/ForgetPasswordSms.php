<?php

namespace App\Sms;

class ForgetPasswordSms extends Smsable {

    private $code;

    public function __construct($code) {
        parent::__construct();
        $this->code = $code;
    }

    public function build(): Smsable {
        return $this->verification_code_sms($this->code)->with_template('deslo')->lookup();
    }

}