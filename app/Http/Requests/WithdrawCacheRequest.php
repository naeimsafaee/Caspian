<?php

namespace App\Http\Requests;

use App\Models\WithdrawCache;
use Carbon\Carbon;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

class WithdrawCacheRequest extends FormRequest {

    public function rules() {

        $client = auth()->guard('clients')->user();

        $max_withdraw = $client->max_withdraw;

        $last_month_withdraw = WithdrawCache::query()->where([
            'client_id' => auth()->guard('clients')->user()->id,
            'is_paid' => true,
        ])->where('pay_at' , '>=' , Carbon::now()->subMonth())->sum('amount');

        $available_withdraw = max($max_withdraw - $last_month_withdraw , 0);

        if($this->has('amount') && ((int)str_replace("," , "" , $this->amount) > $available_withdraw))
            throw ValidationException::withMessages(['amount' => 'برداشت شما از حد مجاز ماهانه عبور کرده است.']);

        return [
            'amount' => ['string', 'required'],
            'account_id' => ['exists:account_cards,id', 'required'],
        ];
    }
}
