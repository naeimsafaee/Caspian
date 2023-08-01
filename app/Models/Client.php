<?php

namespace App\Models;

use App\Observers\ClientObserver;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client extends Authenticatable {

    use HasFactory;

    protected $appends = ['send_intermediate', 'send_advance', 'security_number', 'max_withdraw'];

    protected $fillable = [
        'email',
        'password',
        'phone',
        'phone_code',
        'name',
        'last_name',
        'melli_code'
    ];

    public function coin($coin_id) {

        $amount = ClientCoin::query()->where([
            'client_id' => $this->id,
            'coin_id' => $coin_id
        ])->firstOrCreate([
            'client_id' => $this->id,
            'coin_id' => $coin_id
        ])->amount;

        return (float)($amount);
    }

    public function coins() {
        return $this->hasMany(ClientCoin::class)->available();
    }

    public function card() {
        return $this->hasMany(Card::class);
    }

    public function copiers() {
        return $this->belongsToMany(Client::class, ClientToTrader::class,
            'trader_id', 'client_id');
    }

    public function getSendIntermediateAttribute() {
        return $this->hasOne(Intermediate::class)->where('status', 0)->count() > 0;
    }

    public function getSendAdvanceAttribute() {
        return $this->hasOne(Advance::class)->where('status', 0)->count() > 0;
    }

    public function getSecurityNumberAttribute() {
        $number = 0;
        if ($this->is_2fa_email)
            $number++;

        if ($this->is_2fa_phone)
            $number++;

        if ($this->is_2fa_authenticator)
            $number++;

        return $number;
    }

    public function getMaxWithdrawAttribute() {
        if ($this->level === 1)
            return 50000000;
        elseif ($this->level === 2)
            return 100000000;
        elseif ($this->level === 3)
            return 500000000;

        return 0;
    }

}
