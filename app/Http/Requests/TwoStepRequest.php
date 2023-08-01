<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Session;

class TwoStepRequest extends FormRequest {

    public function rules() {

        $client = Client::query()->findOrFail(Session::get('client_id'));

        $array = [];

        if($client->is_2fa_email)
            $array["email_code"] = ['required' , 'exists:clients,email_code'];

        if($client->is_2fa_phone)
            $array["sms_code"] = ['required' , 'exists:clients,phone_code'];

        if($client->is_2fa_authenticator){
            $array["auth_code"] = ['required'];
        }

        return $array;
    }

    public function messages() {
        return [
            'email_code.required' => 'کد تایید ایمیل الزامی می باشد.',
            'email_code.exists' => 'کد تایید ایمیل اشتباه می باشد.',
            'sms_code.required' => 'کد تایید پیامک الزامی می باشد.',
            'sms_code.exists' => 'کد تایید پیامک اشتباه می باشد.',
        ];
    }
}
