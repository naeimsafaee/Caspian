<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class CopyTradeRequestRequest extends FormRequest {

    public function rules() {

        if (setting('static.copytrade_fee') > auth()->guard('clients')->user()->wallet)
            throw ValidationException::withMessages(['amount' => 'موجودی کیف پول شما کافی نیست.']);

        return [
            'username' => ['string', 'required' , 'unique:traders,username'],
            'copy_trade_type' => ['required', Rule::in([0, 1, 2])],
            'first_price' => ['nullable', 'string', Rule::requiredIf(fn() => request()->copy_trade_type == 0)],
            'second_price' => ['nullable', 'integer', Rule::requiredIf(fn() => request()->copy_trade_type == 1), 'max:100', "min:1"],
        ];
    }

    public function messages() {
        return [
            'username.unique' => "نام کاربری قبلا استفاده شده است.",
            'username.*' => "نام کاربری اجباری می باشد.",
            "copy_trade_type.*" => "لطفا یک حالت پرداختی انتخاب کنید.",
            "first_price.*" => "لطفا مبلغ پرداختی ابتدایی خود را وارد نمایید.",
            "second_price.max" => "درصد برداشتی از معاملات نمی تواند بیشتر از ۱۰۰ باشد.",
            "second_price.min" => "درصد برداشتی از معاملات نمی تواند کمتر از ۰ باشد.",
            "second_price.*" => "لطفا درصد پرداختی از معاملات خود را وارد نمایید.",
        ];
    }
}
