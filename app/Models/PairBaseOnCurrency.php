<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PairBaseOnCurrency extends Model {
    use HasFactory;

//    protected $appends = ['high', 'low'];

    public function coin() {
        return $this->belongsTo(Coin::class, 'coin_id', 'id');
    }

    public function vs_coin() {
        return $this->belongsTo(Currency::class, 'vs_currency_id', 'id');
    }

    public function high() {
        return ChangeBaseOnCurrency::query()->where('pair_id', $this->id)
            ->whereDate('created_at', Carbon::today())->orderByDesc('price')->first()?->price;
    }

    public function low() {
        return ChangeBaseOnCurrency::query()->where('pair_id', $this->id)
            ->whereDate('created_at', Carbon::today())->orderBy('price')->first()?->price;
    }

}
