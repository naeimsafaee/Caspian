<?php

namespace App\Http\Requests;

use App\Models\Coin;
use App\Models\Network;
use Illuminate\Foundation\Http\FormRequest;

class CoinWithdrawSubmit extends FormRequest {

    public function rules() {

        $coin = Coin::query()->find($this->coin_id);
        $network = Network::query()->find($this->network_id);

        $available_amount = 0;

        if ($coin && $network) {

            $client_coin = auth()->guard('clients')->user()->coin($this->coin_id);
            $fee = $network->coin_fee($coin->id);

            $available_amount = $client_coin + $fee;
        }

        return [
            "address" => ['required', 'string'],
            "amount" => ['required', 'gt:0', 'lte:' . $available_amount],
            'network_id' => ['required', 'exists:networks,id'],
            'coin_id' => ['required', 'exists:coins,id']
        ];
    }

    public function messages() {
        return [
            "address.required" => "آدرس کیف پول را وارد نمایید.",
            "amount.required" => "لطفا مقدار برداشت را وارد نمایید.",
            "network_id.required" => "لطفا شبکه را انتخاب نمایید.",
            "amount.gt" => "مقدار درخواستی باید بزرگ تر از صفر باشد.",
            "amount.lte" => "مقدار درخواستی باید کوچکتر از :value باشد.",
        ];
    }
}
