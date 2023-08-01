<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class Coin extends Model {
    use HasFactory;

    protected $fillable = [
        'name',
        'persian_name',
        'symbol',
        'in_home'
    ];

    protected $appends = ['is_favorite' , 'max_withdraw_monthly'];
    
    public function getPersianNameAttribute($persian_name) {
        if (!$persian_name)
            return $this->name;
        return $persian_name;
    }

    public function getMaxWithdrawMonthlyAttribute() {
        return 1000;
    }

    public function getIconAttribute($icon) {
        if(request()->is('kcp'))
            return $icon;
        return ($icon ? Voyager::image($icon) : asset('assets/crypto/white/' . strtolower($this->symbol) . '.svg'));
    }

    public function pair() {
        return $this->belongsToMany(Coin::class, Pair::class, 'coin_id', 'vs_coin_id');
    }

    public function getSymbolAttribute($symbol) {
        return strtoupper($symbol);
    }

    public function networks() {
        return $this->belongsToMany(Network::class , CoinNetwork::class);
    }

    public function favorite() {
        return $this->hasMany(FavoriteCoin::class);
    }

    public function getIsFavoriteAttribute() {
        if(!auth()->guard('clients')->check())
            return false;

        return FavoriteCoin::query()->where(['client_id' => auth()->guard('clients')->user()->id , 'coin_id' => $this->id])->count() > 0;
    }

    public function getChangeAttribute($change) {
        if($this->symbol == 'usdt')
            return 0;
        $tether = Coin::query()->where('symbol', 'usdt')->first();

        $pair_coin = Pair::query()->where('coin_id', $this->id)
            ->where('vs_coin_id', $tether->id)->first();

        if(!$pair_coin)
            return 0;

        $today_changes = Change::query()->where('pair_id', $pair_coin->id)
            ->whereDate('created_at', Carbon::today());

        if ($today_changes->count() == 0)
            return 0;

        $today_start = Change::query()->where('pair_id', $pair_coin->id)
            ->whereDate('created_at', Carbon::today())
            ->orderBy('created_at')->first()->price;

        $today_end = Change::query()->where('pair_id', $pair_coin->id)
            ->whereDate('created_at', Carbon::today())
            ->orderByDesc('created_at')->first()->price;

        return round(($today_end - $today_start) / $today_start * 100 , 4);
    }

}
