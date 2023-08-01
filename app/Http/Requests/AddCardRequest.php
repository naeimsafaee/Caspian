<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Morilog\Jalali\Jalalian;

class AddCardRequest extends FormRequest {

    public function rules() {
        return [
            'owner' => ['required', 'string'],
            'card_number' => ['required', 'string', 'size:16', 'unique:cards,card_number'],
            'bank_id' => ['required', 'exists:banks,id'],
            'cvv2' => ['required', 'min:3', 'max:4'],
            'expiry_date' => ['required', function($attribute, $value, $fail) {
                
                $jDate = Jalalian::fromFormat('Y/m/d', fa_number($value , true));
                if($jDate->isPast())
                    $fail('تاریخ انقضای کارت شما گذشته است.');

            }],
        ];
    }

    public function messages() {
        return [
            'owner.*' => "نام صاحب کارت الزامی میباشد.",
            'card_number.required' => 'شماره کارت الزامی میباشد.',
            'card_number.size' => 'شماره کارت باید ۱۶ رقم  باشد.',
            'card_number.unique' => 'این شماره کارت قبلا در کاسپین ثبت شده است.',
            'bank_id.*' => 'لطفا بانک خود را انتخاب کنید.',
            'cvv2.*' => 'لطفا cvv2 خود را صحیح وارد کنید.',
        ];
    }
}
