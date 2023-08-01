<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterEmailRequest extends FormRequest {

    protected $errorBag = 'email';

    public function rules() {
        return [
            "email" => ["required", 'unique:clients,email' , 'email'],
            'password' => ['required', 'min:8']
        ];
    }

    public function messages() {
        return [
            'email.required' => 'ایمیل الزامی است',
            'email.unique' => 'این ایمیل قبلا استفاده شده است',
            'email.email' => 'ایمیل معتبر نمی باشد',
            'password.required' => 'رمزعبور الزامی است',
            'password.min' => 'رمزعبور باید حداقل 8 حرف باشد',
        ];
    }
}
