<?php

namespace App\Http\Requests;

use Iamfarhad\Validation\Rules\Mobile;
use Illuminate\Foundation\Http\FormRequest;

class RegisterPhoneRequest extends FormRequest {

    protected $errorBag = 'phone';

    public function rules() {
        return [
            "phone" => ["required", 'unique:clients,phone', new Mobile()],
            'password' => ['required', 'min:8']
        ];
    }

    public function messages() {
        return [
            'phone.required' => 'شماره موبایل الزامی است',
            'phone.unique' => 'این شماره موبایل قبلا استفاده شده است',
            'password.required' => 'رمزعبور الزامی است',
            'password.min' => 'رمزعبور باید حداقل 8 حرف باشد',
        ];
    }
}
