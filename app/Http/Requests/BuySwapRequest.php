<?php

namespace App\Http\Requests;

use App\Models\Coin;
use App\Models\Currency;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class BuySwapRequest extends FormRequest {

    public function rules() {

        if (((float)setting('static.swap_fee')) > auth()->guard('clients')->user()->wallet)
            throw ValidationException::withMessages(['amount' => 'موجودی کیف پول شما برای پرداخت هزینه تراکنش کافی نیست.']);


        return [
            'coin' => ['required' , function($attribute, $value, $fail) {

                $coin = Coin::query()->where('symbol', $value)->first();
                $currency = Currency::query()->where('symbol', $value)->first();

                if(!$coin && !$currency)
                    $fail('ارز مورد نظر شما وجود ندارد!');
            }],
            'vs_coin' => ['required', function($attribute, $value, $fail) {

                $coin = Coin::query()->where('symbol', $value)->first();
                $currency = Currency::query()->where('symbol', $value)->first();

                if(!$coin && !$currency)
                    $fail('ارز مورد نظر شما وجود ندارد!');
            }],
            'amount' => ['required', 'string'],
        ];
    }

    public function messages() {
        return [
            'amount.required' => "مقدار خرید باید بزرگ تر از صفر باشد.",
        ];
    }
}
