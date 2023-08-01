<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trader extends Model {
    use HasFactory;

    protected $fillable = [
        'client_id',
        'username',
        'pay_type',
        'paid_value',
        'pay_value'
    ];

    protected $appends = ['risk', 'win_rate', 'loss_rate' , 'position_count', 'is_follow', 'is_copy', 'value_text'];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function follow() {
        return $this->hasOne(FollowTrader::class);
    }

    public function copies() {
        return $this->hasMany(ClientToTrader::class);
    }

    public function getRiskAttribute() {
        return 5;
    }

    public function getWinRateAttribute() {
        return 50;
    }

    public function getLossRateAttribute() {
        return 20;
    }

    public function getPositionCountAttribute() {
        return Bid::query()->where('client_id' , $this->client_id)->count() + Offer::query()->where('client_id' , $this->client_id)->count();
    }

    public function getIsFollowAttribute() {
        return FollowTrader::query()->where([
                'client_id' => auth()->guard('clients')->user()->id,
                'trader_id' => $this->id
            ])->count() > 0;
    }

    public function getIsCopyAttribute() {
        return ClientToTrader::query()->where([
                'client_id' => auth()->guard('clients')->user()->id,
                'trader_id' => $this->id
            ])->count() > 0;
    }

    public function getValueTextAttribute() {
        if ($this->pay_type == 'first_pay')
            return "مبلغ " . fa_number(number_format($this->pay_value)) . ' تومان پرداخت کنید ';
        elseif ($this->pay_type == 'free')
            return "به صورت رایگان کپی کنید ";
        return "برای هر معامله " . fa_number(number_format($this->profit_percent)) . " درصد از سود معامله خود را پرداخت خواهید کرد ";
    }

}
