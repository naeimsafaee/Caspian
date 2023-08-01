<?php

namespace App\Http\Requests;

use App\Models\DepositCach;
use Illuminate\Foundation\Http\FormRequest;

class DepositCashRequest extends FormRequest {

    public function rules() {

//        $client = auth()->guard('clients')->user();
//        $max_amount = 0;

       /* $sum_amount = DepositCach::query()->where([
            'client_id' => $client->id,
            'is_paid' => true
        ])->sum('amount');*/

       /* if ($client->level === 1) {
            $max_amount = 50000000 - $sum_amount;
        } elseif ($client->level === 2) {
            $max_amount = 100000000 - $sum_amount;
        } elseif ($client->level === 3) {
            $max_amount = 500000000 - $sum_amount;
        }*/

        return [
            'amount' => ['string', 'required'],
            'card_id' => ['exists:cards,id', 'required'],
        ];
    }


    public function messages() {
        return [
            'amount.required' => "لطفا مبلغ را وارد کنید",
            'card_id.required' => "کارت را باید انتخاب کنید",
            'card_id.exists' => "کارت وجود ندارد",
        ];
    }
}
