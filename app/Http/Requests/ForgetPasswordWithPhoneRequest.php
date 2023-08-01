<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class ForgetPasswordWithPhoneRequest extends FormRequest {
    protected $errorBag = 'phone';

    public function rules() {
        return [
            "phone" => ["required", 'exists:clients,phone'],
        ];
    }

    public function messages() {
        return [
            'phone.required' => 'شماره موبایل الزامی است',
            'phone.exists' => 'کاربر پیدا نشد',
        ];
    }

}
