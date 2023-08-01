<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginPhoneRequest extends FormRequest
{
    protected $errorBag = 'phone';

    public function rules()
    {
        return [
            "phone" => ["required" , 'exists:clients,phone'],
            'password' => ['required']

        ];
    }

    public function messages()
    {
        return [
            'phone.required' => 'موبایل الزامی است',
            'phone.exists' => 'کاربر پیدا نشد',
            'password.required' => 'رمزعبور الزامی است',
        ];
    }
}
