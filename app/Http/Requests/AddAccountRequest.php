<?php

namespace App\Http\Requests;

use Iamfarhad\Validation\Rules\Sheba;
use Illuminate\Foundation\Http\FormRequest;

class AddAccountRequest extends FormRequest {

    public function rules() {
        return [
            'owner' => ['required', 'string'],
            'account_number' => ['required', 'string', 'unique:account_cards,account_number' , new Sheba()],
        ];
    }

    public function messages() {
        return [
            'owner.*' => "نام صاحب کارت الزامی میباشد.",
            'account_number.required' => 'شماره شبا الزامی میباشد.',
            'account_number.unique' => 'این شماره شبا قبلا در کاسپین ثبت شده است.',
        ];
    }
}
