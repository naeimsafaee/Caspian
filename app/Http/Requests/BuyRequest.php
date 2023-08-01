<?php

namespace App\Http\Requests;

use App\Models\Client;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class BuyRequest extends FormRequest {

    public function rules() {

        $client_wallet = auth()->guard('clients')->user()->wallet;
        if($client_wallet < setting('static.trade_fee'))
            throw ValidationException::withMessages(['wallet' => 'موجودی حساب شما برای انجام این ترید کافی نیست.']);

        return [
            'coin_id' => ['required', 'exists:coins,id'],
            'vs_coin_id' => ['required', 'exists:coins,id'],
            'amount' => ['required', 'string'],
            'price' => ['required' , 'string' , 'gt:0'],
        ];
    }

    public function messages() {
        return [
            'amount.required' => "مقدار خرید باید بزرگ تر از صفر باشد.",
            'price.gt' => "مبلغ وارد شده باید بزرگ تر از صفر باشید.",
        ];
    }

}
