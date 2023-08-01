<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientCoin extends Model {
    use HasFactory;

    protected $fillable = [
        'client_id', 'coin_id'
    ];

    protected $casts = [
        'amount' => 'float'
    ];

    protected $appends = ['toman_value', 'dollar_value', 'btc_value'];

    public function getAmountAttribute($amount) {

        $coin_id = $this->coin_id;

        $bids_amount = Bid::query()->whereHas('pair', function(Builder $query) use ($coin_id) {
            $pair = Pair::query()->where('vs_coin_id', $coin_id)->select('id')->get()->modelKeys();
            $query->whereIn('id', $pair);
        })->where([
            'status' => 'active',
            'client_id' => auth()->guard('clients')->user()->id
        ])->sum('amount');//total_amount

        $offer_amount = Offer::query()->whereHas('pair', function(Builder $query) use ($coin_id) {
            $pair = Pair::query()->where('coin_id', $coin_id)->select('id')->get()->modelKeys();
            $query->whereIn('id', $pair);
        })->where([
            'status' => 'active',
            'client_id' => auth()->guard('clients')->user()->id
        ])->sum('amount');

        return $amount - $bids_amount - $offer_amount;
    }

    public function coin() {
        return $this->belongsTo(Coin::class);
    }

    public function getTomanValueAttribute() {
        $tether = Currency::query()->findOrFail(setting('static.tether'));
        return $this->amount * $this->coin->price * $tether->price;
    }

    public function getDollarValueAttribute() {
        return $this->amount * $this->coin->price;
    }

    public function getBtcValueAttribute() {
        $bitcoin = Coin::query()->where('symbol', 'btc')->firstOrFail();
        return $this->amount * $this->coin->price / $bitcoin->price;
    }

    public function scopeAvailable($query) {
        return $query->where('status', 'free');
    }

}
