<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginEmailRequest extends FormRequest {
    protected $errorBag = 'email';

    public function rules() {
        return [
            "email" => ["required", 'exists:clients,email', 'email'],
            'password' => ['required']
        ];
    }

    public function messages() {
        return [
            'email.email' => 'لطفا ایمیل را به درستی وارد کنید',
            'email.required' => 'ایمیل الزامی است',
            'email.exists' => 'کاربر پیدا نشد',
            'password.required' => 'رمزعبور الزامی است',
        ];
    }
}
