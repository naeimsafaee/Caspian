<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordRequest extends FormRequest {
    protected $errorBag = 'email';

    public function rules() {

        return [
            'email' => ["required", 'exists:clients,email'],
        ];
    }

    public function messages() {
        return [
            'email.required' => 'ایمیل الزامی است',
            'email.exists' => 'کاربر پیدا نشد',
        ];
    }
}
